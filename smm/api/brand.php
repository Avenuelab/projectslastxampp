<?php
include_once('db_connect.php');
class Brand
{
    var $id,$name,$active,$status;

    function __construct($id,$name,$active,$status)
    {
      $this->id = $id;
      $this->name = $name;
      $this->active = $active;
      $this->status = $status;

    }

    public static function loadAll()
    {
        $arr = array();
        $sql = "select * from brands";
        $list = DataStock::execQuery($sql);
        while ($row = mysqli_fetch_array($list)) {

          $cm = new Brand($row["brand_id"], $row["brand_name"], $row["brand_active"], $row["brand_status"]);
          array_push($arr, $cm);

        }
        return $arr;
    }

    public static function addBrand($name, $active, $status)
    {
        $sql = "select * from brands";
        $sql = "INSERT INTO brands (brand_id ,brand_name ,brand_active ,brand_status) VALUES (NULL ,  '$name',  '$active',  '$status')";
        return DataStock::execQuery($sql);
    }

    public static function updateBrand($id, $name, $active, $status)
    {
        $sql = "update brands set brand_name = '$name', brand_active = '$active', brand_status = '$status' where brand_id = $id";
        return DataStock::execQuery($sql);

    }

    public static function deleteBrand($id) 
    {
      $sql = "delete from brands where brand_id = $id";
      return DataStock::execQuery($sql);
    }

}