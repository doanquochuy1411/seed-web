<?php
class Category extends DB
{
    public function GetCategoryList()
    {
        $sql = "SELECT * FROM category";
        return $this->executeSelectQuery($sql);
    }
    public function GetFeatureCategoryList($amount)
    {
        $sql = "SELECT c.id, c.name, COUNT(p.id) AS product_count FROM category c LEFT JOIN product p ON c.id = p.category_id GROUP BY c.id, c.name ORDER BY product_count DESC LIMIT ?;";
        return $this->executeSelectQuery($sql, [$amount]);
    }

}
?>