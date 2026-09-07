<?php
include_once('db_connect.php');
class Category
{
    var $id,$name,$active, $status;

    function __construct($id,$name,$active, $status)
    {
      $this->id = $id;
      $this->name = $name;
      $this->active = $active;
      $this->status = $status;
    }

    public static function loadAll()
    {
        $arr = array();
        $sql = "select * from categories";
        $list = DataStock::execQuery($sql);
        while ($row = mysqli_fetch_array($list)) {

          $cm = new Category($row["categories_id"], $row["categories_name"], $row["categories_active"], $row["categories_status"]);
          array_push($arr, $cm);

        }
        return $arr;
    }

    public static function addCategory($name, $active, $status)
    {
        $sql = "select * from categories";
        $sql = "INSERT INTO categories (categories_id ,categories_name ,categories_active ,categories_status) VALUES (NULL ,  '$name',  '$active',  '$status')";
        return DataStock::execQuery($sql);
    }

    public static function updateCategory($id, $name, $active, $status)
    {
        $sql = "update categories set categories_name = '$name', categories_active = '$active', categories_status = '$status' where categories_id = $id";
        return DataStock::execQuery($sql);

    }

    public static function deleteCategory($id) 
    {
      $sql = "delete from categories where categories_id = $id";
      return DataStock::execQuery($sql);
    }

}
