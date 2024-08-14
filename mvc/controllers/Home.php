<?php
class Home extends Controller
{
    public $UserModel;
    protected $CategoryModel;
    protected $ProductModel;


    public $layout = "main_layout";
    public $page = "home";
    public $title = "Trang chủ";

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
            "Page" => "home",
            "title" => $this->title,
            "amount_cart" => $count,
            "total" => $total,
            "user_name" => $userName,
            "category_list" => $categories,
            "category_feature_list" => $category_feature_list,
            "product_list" => $product_list,
        ]);
    }
    function Redirect($param)
    {
        $count = 0;
        $total = 0;
        $userName = "";
        $categories = $this->CategoryModel->GetCategoryList();
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

        switch ($param) {
            case 'contact':
                $this->view($this->layout, [
                    "Page" => "contact",
                    "title" => "Liên hệ",
                    "amount_cart" => $count,
                    "total" => $total,
                    "user_name" => $userName,
                    "category_list" => $categories,

                ]);
                break;
            case 'blog':
                $this->view($this->layout, [
                    "Page" => "blog",
                    "title" => "Blog",
                    "amount_cart" => $count,
                    "total" => $total,
                    "user_name" => $userName,
                    "category_list" => $categories,

                ]);
                break;
            case 'shop-grid':
                $this->view($this->layout, [
                    "Page" => "shop_grid",
                    "title" => "Cửa hàng",
                    "amount_cart" => $count,
                    "total" => $total,
                    "user_name" => $userName,
                    "category_list" => $categories,

                ]);
                break;
            case 'shop-details':
                $this->view($this->layout, [
                    "Page" => "shop_details",
                    "title" => "Chi tiết",
                    "amount_cart" => $count,
                    "total" => $total,
                    "user_name" => $userName,
                    "category_list" => $categories,

                ]);
                break;
            case 'blog-details':
                $this->view($this->layout, [
                    "Page" => "blog_details",
                    "title" => "Chi tiết Blog",
                    "amount_cart" => $count,
                    "total" => $total,
                    "user_name" => $userName,
                    "category_list" => $categories,

                ]);
                break;
            case 'checkout':
                $this->view($this->layout, [
                    "Page" => "checkout",
                    "title" => "Thanh toán",
                    "amount_cart" => $count,
                    "total" => $total,
                    "user_name" => $userName,
                    "category_list" => $categories,

                ]);
                break;
            case 'shopping-cart':
                $this->view($this->layout, [
                    "Page" => "shopping_cart",
                    "title" => "Giỏ hàng",
                    "amount_cart" => $count,
                    "total" => $total,
                    "user_name" => $userName,
                    "category_list" => $categories,

                ]);
                break;
            default:
                header('Location: ' . BASE_URL);
                break;
        }
        exit();
    }

    function Logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();

        header("Location: " . BASE_URL);
        exit();
    }
}
?>