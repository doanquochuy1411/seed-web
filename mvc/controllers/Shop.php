<?php
class Shop extends Controller
{
    protected $ProductModel;
    public $UserModel;
    protected $CategoryModel;

    public $layout = "main_layout";
    public $page = "shop_grid";
    public $title = "Cửa hàng";

    public function __construct()
    {
        $this->UserModel = $this->model("User");
        $this->CategoryModel = $this->model("Category");
        $this->ProductModel = $this->model("Product");
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
}

?>