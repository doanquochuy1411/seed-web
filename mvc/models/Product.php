<?php
class Product extends DB
{
    public function GetProductList()
    {
        $sql = "SELECT p.*, c.name AS category_name FROM product p JOIN category c ON p.category_id = c.id WHERE p.deleted_at IS NULL;";
        return $this->executeSelectQuery($sql);
    }

    public function GetProductListByCategory($category_id)
    {
        $sql = "SELECT p.*, c.name AS category_name FROM product p JOIN category c ON p.category_id = c.id WHERE p.deleted_at IS NULL and p.category_id = ?";
        return $this->executeSelectQuery($sql, [$category_id]);
    }

    public function GetProductListByCategoryWithLimit($category_id, $limit)
    {
        $sql = "SELECT p.*, c.name AS category_name FROM product p JOIN category c ON p.category_id = c.id WHERE p.deleted_at IS NULL and p.category_id = ? order by id desc limit ?";
        return $this->executeSelectQuery($sql, [$category_id, $limit]);
    }

    public function GetProductListAtLeast($amount)
    {
        $sql = "SELECT p.*, c.name AS category_name FROM product p JOIN category c ON p.category_id = c.id WHERE p.deleted_at IS NULL order by id desc limit ?";
        return $this->executeSelectQuery($sql, [$amount]);
    }
    public function GetProductByID($id)
    {
        $sql = "SELECT p.*, c.name AS category_name FROM product p JOIN category c ON p.category_id = c.id WHERE p.deleted_at IS NULL and p.id = ?";
        return $this->executeSelectQuery($sql, [$id]);
    }

    public function GetProductByName($name)
    {
        $name = '%' . $name . '%';
        $sql = "SELECT p.*, c.name AS category_name FROM product p JOIN category c ON p.category_id = c.id WHERE p.deleted_at IS NULL and p.name like ?";
        return $this->executeSelectQuery($sql, [$name]);
    }

    public function GetProductInCart($userID)
    {
        $sql = "SELECT c.*, p.name as product_name, p.image_url, p.sale_price, p.stock_quantity from cart c JOIN product p on p.id = c.product_id where c.user_id = ?";
        return $this->executeSelectQuery($sql, [$userID]);
    }

}
?>