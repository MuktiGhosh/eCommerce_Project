<?php

include("header.php");
require_once("Category.php");
include_once('DB.php');

//Use your dbname, host, user and password here
$db = new DB('localhost', 'root', 'root1234', 'e_commerce');
$db->connect();

$categories = new Category();
$categoriesWithItemsQuery = $categories->getCategoriesWithTotalItemsQuery();

//Retrieve data from database
$categoriesWithItems = $db->getDataFromTable($categoriesWithItemsQuery);
?>
<table style="border-collapse: collapse" border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Total Items</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(is_array($categoriesWithItems)){
        foreach($categoriesWithItems as $categoriesWithItem){
            ?>
            <tr>
                <td><?php echo $categoriesWithItem['Name'] ?? ''; ?></td>
                <td><?php echo $categoriesWithItem['total_items'] ?? ''; ?></td>
            </tr>
            <?php
            }
    }else{ ?>
        <tr>
            <td colspan="2">
                <?php echo "No data found"; ?>
            </td>
        <tr>
        <?php
        }?>
    </tbody>
</table>
