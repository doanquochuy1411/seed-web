<?php
class CartModel extends DB
{
    public function GetCartByUserID($userID)
    {
        $sql = "SELECT p.name,p.id as product_id,p.image_url, p.sale_price, c.quantity, c.id as cart_id FROM cart c JOIN product p ON c.product_id = p.id WHERE c.user_id = ?";
        return $this->executeSelectQuery($sql, [$userID]);
    }

    public function GetProductInCartOfUserID($userID, $productID)
    {
        $sql = "SELECT p.name,p.id as product_id,p.image_url, p.sale_price, c.quantity, c.id as cart_id FROM cart c JOIN product p ON c.product_id = p.id WHERE c.user_id = ? and c.product_id = ?";
        return $this->executeSelectQuery($sql, [$userID, $productID]);
    }

    public function UpdateCart($userID, $productID, $quantity)
    {
        $sql = "UPDATE cart set quantity = ? WHERE user_id = ? and product_id = ?";
        return $this->executeQuery($sql, [$quantity, $userID, $productID]);
    }

    public function DeleteProductFromCart($userID, $productID)
    {
        $sql = "DELETE FROM cart WHERE user_id = ? and product_id = ?";
        return $this->executeQuery($sql, [$userID, $productID]);
    }

    public function CreateCart($quantity, $userID, $productID)
    {
        $sql = "INSERT INTO cart(quantity, user_id, product_id) VALUES(?,?,?)";
        return $this->executeQuery($sql, [$quantity, $userID, $productID]);
    }

}
?>