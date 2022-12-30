<?php

include("header.php");
include_once('DB.php');
require_once("CategoryTree.php");

$db = new DB();
$db->connect();
$tree = new CategoryTree($db);

$data = $tree->getCategoryTree(null);
$tree->printCategoryTree($data);
$db->close();

?>
