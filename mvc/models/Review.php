<?php
class Review extends DB
{
    public function GetReviewOfProduct($productID)
    {
        $sql = "SELECT r.*, u.full_name, u.image FROM review r join user u on r.user_id = u.id where r.product_id = ? order by created_at desc";
        return $this->executeSelectQuery($sql, [$productID]);
    }

}
?>