<?php
class CategoryTree
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    private function fetchCategories($parentId)
    {
        return $this->db->getCategories($parentId);
    }

    private function buildCategoryTree($parentId)
    {
        $categoryTree = [];
        $categories = $this->fetchCategories($parentId);
        foreach ($categories as $category) {
            $children = $this->buildCategoryTree($category['Id']);
            $node = array(
                'name' => $category['Name'],
                'total_items' => $category['total_items'],
            );
            if (!empty($children)) {
                $node['children'] = $children;
                $node['total_items'] += array_sum(array_column($children, 'total_items'));
            }
            $categoryTree[] = $node;
        }
        return $categoryTree;
    }

    public function getCategoryTree()
    {
        return $this->buildCategoryTree(null);
    }

    public function printCategoryTree($tree, $indent = "")
    {
        foreach ($tree as $node) {
            $total = $node['total_items'];
            echo $indent . $node['name'] . " (" . $total . ")<br>";
            if (isset($node['children']) && !empty($node['children'])) {
                foreach ($node['children'] as $child) {
                    $total += $child['total_items'];
                }
                $this->printCategoryTree($node['children'], $indent . "&nbsp;&nbsp;&nbsp;");
            }
        }
    }
}