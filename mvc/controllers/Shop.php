<?php
class Shop extends Controller
{
    protected $ProductModel;
    public $UserModel;
    protected $CategoryModel;
    protected $ReviewModel;

    public $layout = "main_layout";
    public $page = "shop_grid";
    public $title = "Cửa hàng";

    public function __construct()
    {
        $this->UserModel = $this->model("User");
        $this->CategoryModel = $this->model("Category");
        $this->ProductModel = $this->model("Product");
        $this->ReviewModel = $this->model("Review");
    }

    function Index()
    {
        $count = 0;
        $total = 0;
        $userName = "";

        $categories = $this->CategoryModel->GetCategoryList();
        $products = $this->ProductModel->GetProductList();
        $product_at_least = $this->ProductModel->GetProductListAtLeast(3);


        $category_list = mysqli_fetch_all($categories, MYSQLI_ASSOC);
        $product_list = mysqli_fetch_all($products, MYSQLI_ASSOC);
        $product_at_least_list = mysqli_fetch_all($product_at_least, MYSQLI_ASSOC);

        if (isset($_SESSION["UserID"])) {
            $data = $this->UserModel->GetCartDetailByUserID($_SESSION["UserID"]);
            if ($data && $data->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
                    $total += $row['quantity'] * $row['sale_price'];
                    $count += 1;
                    $userName = $row["full_name"];
                }
            }
        }

        $this->view($this->layout, [
            "Page" => $this->page,
            "title" => $this->title,
            "amount_cart" => $count,
            "total" => $total,
            "user_name" => $userName,
            "category_list" => $category_list,
            "product_list" => $product_list,
            "product_at_least" => $product_at_least_list,
        ]);
    }

    function Categories($category_id)
    {
        $count = 0;
        $total = 0;
        $userName = "";

        $categories = $this->CategoryModel->GetCategoryList();
        $all_products = $this->ProductModel->GetProductList();
        $products = $this->ProductModel->GetProductListByCategory($category_id);
        $product_at_least = $this->ProductModel->GetProductListAtLeast(3);

        $category_list = mysqli_fetch_all($categories, MYSQLI_ASSOC);
        $product_list = mysqli_fetch_all($products, MYSQLI_ASSOC);
        $product_at_least_list = mysqli_fetch_all($product_at_least, MYSQLI_ASSOC);
        $all_product = mysqli_fetch_all($all_products, MYSQLI_ASSOC);

        if (isset($_SESSION["UserID"])) {
            $data = $this->UserModel->GetCartDetailByUserID($_SESSION["UserID"]);
            if ($data && $data->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
                    $total += $row['quantity'] * $row['sale_price'];
                    $count += 1;
                    $userName = $row["full_name"];
                }
            }
        }

        $this->view($this->layout, [
            "Page" => "shop_grid_category",
            "title" => $this->title,
            "amount_cart" => $count,
            "total" => $total,
            "user_name" => $userName,
            "category_list" => $category_list,
            "product_list" => $product_list,
            "all_product" => $all_product,
            "product_at_least" => $product_at_least_list,
        ]);
    }

    function HandleSearchProducts()
    {
        if (isset($_REQUEST["btnSearch"])) {
            $name = $_REQUEST["product_name"];
            $val = validateNoSpecialChars($name);
            if (!$val) {
                $products = $this->ProductModel->GetProductByName("");
            } else {
                $products = $this->ProductModel->GetProductByName($name);
            }
            $count = 0;
            $total = 0;
            $userName = "";

            $categories = $this->CategoryModel->GetCategoryList();
            $all_products = $this->ProductModel->GetProductList();
            $product_at_least = $this->ProductModel->GetProductListAtLeast(3);

            $category_list = mysqli_fetch_all($categories, MYSQLI_ASSOC);
            $product_list = mysqli_fetch_all($products, MYSQLI_ASSOC);
            $product_at_least_list = mysqli_fetch_all($product_at_least, MYSQLI_ASSOC);
            $all_product = mysqli_fetch_all($all_products, MYSQLI_ASSOC);

            if (isset($_SESSION["UserID"])) {
                $data = $this->UserModel->GetCartDetailByUserID($_SESSION["UserID"]);
                if ($data && $data->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($data)) {
                        $total += $row['quantity'] * $row['sale_price'];
                        $count += 1;
                        $userName = $row["full_name"];
                    }
                }
            }

            $this->view($this->layout, [
                "Page" => "shop_grid_category",
                "title" => $this->title,
                "amount_cart" => $count,
                "total" => $total,
                "user_name" => $userName,
                "category_list" => $category_list,
                "product_list" => $product_list,
                "all_product" => $all_product,
                "product_at_least" => $product_at_least_list,
            ]);
        }
    }
    function Products($id)
    {
        $val = validateNoSpecialChars($id);
        if (!$val) {
            header('Location: ' . BASE_URL . '/Home');
            exit();
        } else {
            $product = $this->ProductModel->GetProductByID($id);
        }
        $count = 0;
        $total = 0;
        $userName = "";

        $productDetail = mysqli_fetch_all($product, MYSQLI_ASSOC);
        $categories = $this->CategoryModel->GetCategoryList();
        $related_products = $this->ProductModel->GetProductListByCategoryWithLimit($productDetail[0]['category_id'], 4);
        $reviews = $this->ReviewModel->GetReviewOfProduct($id);

        $category_list = mysqli_fetch_all($categories, MYSQLI_ASSOC);
        $related_product_list = mysqli_fetch_all($related_products, MYSQLI_ASSOC);
        $review_list = mysqli_fetch_all($reviews, MYSQLI_ASSOC);

        if (isset($_SESSION["UserID"])) {
            $data = $this->UserModel->GetCartDetailByUserID($_SESSION["UserID"]);
            if ($data && $data->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
                    $total += $row['quantity'] * $row['sale_price'];
                    $count += 1;
                    $userName = $row["full_name"];
                }
            }
        }

        $this->view($this->layout, [
            "Page" => "shop_details",
            "title" => $this->title,
            "amount_cart" => $count,
            "total" => $total,
            "user_name" => $userName,
            "category_list" => $category_list,
            "product" => $productDetail,
            "related_product" => $related_product_list,
            "review_list" => $review_list,
        ]);
    }
}

?>