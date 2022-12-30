<?php

include("header.php");
include_once('DB.php');
require_once("CategoryTree.php");

//Use your dbname, host, user and password here
$db = new DB('localhost', 'root', 'root1234', 'e_commerce');
$db->connect();
$tree = new CategoryTree($db);

$data = $tree->getCategoryTree(null);
$tree->printCategoryTree($data);
$db->close();

?>
