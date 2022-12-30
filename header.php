<style>
    .selected {
        color: crimson;
        background-color: lightblue;
        display: inline;

    }
</style>

<header>
    <h2>Ecommerce</h2>
</header>
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav>
    <ul>
        <li <?php if ($currentPage == 'index.php') {echo 'class="selected"';} ?>><a href="index.php">Home</a></li>
        <li <?php if ($currentPage == 'category_list_page.php') {echo 'class="selected"';} ?>><a href="category_list_page.php">Category List</a></li>
        <li <?php if ($currentPage == 'category_tree_page.php') {echo 'class="selected"';} ?>><a href="category_tree_page.php">Category Tree</a></li>
    </ul>
</nav>
