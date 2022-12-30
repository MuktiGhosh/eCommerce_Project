<?php
class Category
{
    public function getCategoriesWithTotalItemsQuery()
    {
        return "SELECT c.id, c.Name, COUNT(icr.ItemNumber) AS total_items
        FROM category c
            LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId
        GROUP BY c.id
        ORDER BY total_items DESC";
    }
}
