<?php

include("header.php");
include_once('DB.php');

$db = new DB();
$db->connect();

//Retrieve data from database
$categoriesWithItems = $db->getDataFromTable($db->getCategoriesWithTotalItems());
$db->close();
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
