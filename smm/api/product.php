<?php
include_once('db_connect.php');
class Product
{
    var $id, $name, $image, $b_id, $c_id, $p_quant, $p_rate, $p_active, $p_status;

    function __construct($p_id, $p_name, $p_image, $b_id, $c_id, $p_quant, $p_rate, $p_active, $p_status)
    {
      $this->id = $p_id;
      $this->name = $p_name;
      $this->image = $p_image;
      $this->b_id = $b_id;
      $this->c_id = $c_id;
      $this->p_quant = $p_quant;
      $this->p_rate = $p_rate;
      $this->p_active = $p_active;
      $this->p_status = $p_status;
    }


    public static function loadAll()
    {
        $arr = array();
        $sql = "select * from product";
        $list = DataStock::execQuery($sql);
        while ($row = mysqli_fetch_array($list)) {

          $sp = new Product($row["product_id"], $row["product_name"], $row["product_image"], $row["brand_id"], $row["categories_id"], $row["quantity"], $row["rate"], $row["active"], $row["status"]);
          array_push($arr, $sp);

        }
        return $arr;
    }

    public static function addProduct($name, $image, $brand_id, $cat_id, $quantity, $rate, $active, $status)
    {
        $sql = "select * from product";
        $sql = "INSERT INTO product (product_id ,product_name ,product_image ,brand_id ,categories_id ,quantity ,rate ,active ,status) VALUES (NULL ,  '$name',  '$image',  '$brand_id', '$cat_id', '$quantity', '$rate', '$active', '$status')";
        return DataStock::execQuery($sql);
    }

    public static function updateProduct($id, $name, $quantity, $rate) {

        $sql = "update product set product_name = '$name',quantity = '$quantity',rate = '$rate' where product_id = $id";
        return DataStock::execQuery($sql);

    }

    public static function deleteProduct($id) 
    {
      $sql = "delete from product where product_id = $id";
      return DataStock::execQuery($sql);
    }

}
