<?php
class Checkout extends Controller
{
    public $UserModel;
    protected $CategoryModel;
    protected $ProductModel;


    public $layout = "main_layout";
    public $page = "checkout";
    public $title = "Thanh toán";

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
        $phoneNumber = "";
        $address = "";
        $userID = isset($_SESSION["UserID"]) ? $_SESSION["UserID"] : "";

        $categories = $this->CategoryModel->GetCategoryList();
        $cart_products = $this->ProductModel->GetProductInCart($userID);
        $user = $this->UserModel->GetUserByID($userID);

        $category_list = mysqli_fetch_all($categories, MYSQLI_ASSOC);
        $cart_product_list = mysqli_fetch_all($cart_products, MYSQLI_ASSOC);
        $userDetail = mysqli_fetch_all($user, MYSQLI_ASSOC);

        if (count($userDetail) > 0) {
            $userName = $userDetail[0]["full_name"];
            $phoneNumber = $userDetail[0]["phone_number"];
            $address = $userDetail[0]["address"];
        }

        if (isset($_SESSION["UserID"])) {
            $data = $this->UserModel->GetCartDetailByUserID($_SESSION["UserID"]);
            if ($data && $data->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
                    $total += $row['quantity'] * $row['sale_price'];
                    $count += 1;
                }
            }
        }

        $this->view($this->layout, [
            "Page" => "checkout",
            "title" => $this->title,
            "amount_cart" => $count,
            "total" => $total,
            "user_name" => $userName,
            "phone_number" => $phoneNumber,
            "address" => $address,
            "category_list" => $category_list,
            "product_list" => $cart_product_list,
        ]);
    }
}
?>