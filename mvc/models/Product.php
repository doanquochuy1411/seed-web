<?php
class Product extends DB
{
    public function GetProductList()
    {
        $sql = "SELECT p.*, c.name AS category_name FROM product p JOIN category c ON p.category_id = c.id WHERE p.deleted_at IS NULL;";
        return $this->executeSelectQuery($sql);
    }

}
?>