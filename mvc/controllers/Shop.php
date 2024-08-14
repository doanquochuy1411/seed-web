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
        $category_list = mysqli_fetch_all($categories, MYSQLI_ASSOC);
        $category_feature_list = $this->CategoryModel->GetFeatureCategoryList(5);
        $products = $this->ProductModel->GetProductList();
        $product_list = mysqli_fetch_all($products, MYSQLI_ASSOC);

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
            "category_feature_list" => $category_feature_list,
            "product_list" => $product_list,
        ]);
    }
}

?>