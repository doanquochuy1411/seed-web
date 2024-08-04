<?php
class Cart extends DB
{
    public function GetCartByUserID($userID)
    {
        $sql = "SELECT p.name,p.id as product_id,p.image_url, p.sale_price, c.quantity, c.id as cart_id FROM cart c JOIN product p ON c.product_id = p.id WHERE c.user_id = ?";
        return $this->executeQuery($sql, [$userID]);
    }

}
?>