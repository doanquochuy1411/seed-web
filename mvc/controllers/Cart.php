<?php
class Cart extends Controller
{
    protected $ProductModel;
    public $UserModel;
    protected $CategoryModel;
    protected $ReviewModel;
    protected $CartModel;

    public $layout = "main_layout";
    public $page = "shop_grid";
    public $title = "Cửa hàng";

    public function __construct()
    {
        $this->UserModel = $this->model("User");
        $this->CategoryModel = $this->model("Category");
        $this->ProductModel = $this->model("Product");
        $this->ReviewModel = $this->model("Review");
        $this->CartModel = $this->model("CartModel");
    }

    function Index()
    {
        $count = 0;
        $total = 0;
        $userName = "";

        $userID = isset($_SESSION["UserID"]) ? $_SESSION["UserID"] : "";

        $categories = $this->CategoryModel->GetCategoryList();
        $cart_products = $this->ProductModel->GetProductInCart($userID);

        $category_list = mysqli_fetch_all($categories, MYSQLI_ASSOC);
        $cart_product_list = mysqli_fetch_all($cart_products, MYSQLI_ASSOC);

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
            "Page" => "shopping_cart",
            "title" => $this->title,
            "amount_cart" => $count,
            "total" => $total,
            "user_name" => $userName,
            "category_list" => $category_list,
            "product_list" => $cart_product_list,
        ]);
    }

    function HandleCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_ids = $_REQUEST['product_id'];
            $userID = isset($_SESSION["UserID"]) ? $_SESSION["UserID"] : "";


            if (isset($_POST['btnUpdate'])) {
                $quantities = $_REQUEST['quantity'];
                foreach ($product_ids as $index => $product_id) {
                    $quantity = $quantities[$index];
                    if ($quantity == 0) {
                        $this->CartModel->DeleteProductFromCart($userID, $product_id);
                    } else {
                        $this->CartModel->UpdateCart($userID, $product_id, $quantity);
                    }
                }

                $current_cart_items = $this->UserModel->GetCartDetailByUserID($userID);
                $product_ids_in_cart = array_flip($product_ids);

                foreach ($current_cart_items as $item) {
                    $product_id_in_cart = $item['product_id'];

                    if (!isset($product_ids_in_cart[$product_id_in_cart])) {
                        $this->CartModel->DeleteProductFromCart($userID, $product_id_in_cart);
                    }
                }

                echo '<script>alert("Cập nhật giỏ hàng thành công")</script>';
                echo '<script>window.location.href = "' . BASE_URL . '/Cart"</script>';
                exit();
            }
        } else {
            echo '<script>window.location.href = "' . BASE_URL . '/Cart"</script>';
            exit();
        }
    }

    function AddToCart($product_id, $quantity)
    {
        if (!(int) $product_id || !(int) $quantity) {
            echo '<script>window.location.href = "' . BASE_URL . '"</script>';
            exit();
        }

        $userID = isset($_SESSION["UserID"]) ? $_SESSION["UserID"] : "";
        $existsProduct = $this->CartModel->GetProductInCartOfUserID($userID, $product_id);
        $product = mysqli_fetch_all($existsProduct, MYSQLI_ASSOC);


        $check = false;
        if (count($product) > 0) {
            $NewQuantity = $quantity + $product[0]['quantity'];
            $this->CartModel->UpdateCart($userID, $product_id, $NewQuantity);
            $check = true;
        } else {
            $check = $this->CartModel->CreateCart($quantity, $userID, $product_id);
        }
        if ($check) {
            echo '<script>alert("Thêm vào giỏ hàng thành công")</script>';
        } else {
            echo '<script>alert("Thêm vào giỏ hàng thất bại")</script>';
        }
        echo '<script>window.location.href = "' . BASE_URL . '/Cart"</script>';
        exit();
    }
}

?>