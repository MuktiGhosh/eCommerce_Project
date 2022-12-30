<?php

class DB
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $connection;

    public function __construct($host='localhost', $user='root', $password='root1234', $database='e_commerce')
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connection = null;
    }

    public function connect()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->connection) {
            die('Connection Failed:' . mysqli_connect_error());
        }
    }

    public function close()
    {
        mysqli_close($this->connection);
    }

    public function getDataFromTable($query)
    {
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getCategories($parentId)
    {
        if (!$parentId) {
            $query = "SELECT c.Id, c.Name, COUNT(icr.ItemNumber) AS total_items FROM category c LEFT JOIN catetory_relations cr ON c.Id = cr.categoryId 
            LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId WHERE cr.ParentcategoryId IS NULL GROUP BY c.Id";
        } else {
            $query = "SELECT c.Id, c.Name, COUNT(icr.ItemNumber) AS total_items FROM category
            c LEFT JOIN catetory_relations cr ON c.Id = cr.categoryId LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId 
                                                          WHERE cr.ParentcategoryId = $parentId GROUP BY c.Id";
        }
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getCategoriesWithTotalItems(){
        return "SELECT c.id, c.Name, COUNT(icr.ItemNumber) AS total_items
        FROM category c
            LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId
        GROUP BY c.id
        ORDER BY total_items DESC";
    }

}
