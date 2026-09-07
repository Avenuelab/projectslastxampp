<?php
include_once('DataProvider.php');
class SanPham
{
    var $product_id,$product_name,$product_image, $brand_id, $categories_id, $quantity, $rate, $active, $status;

    function __construct($m_id, $m_name, $m_image, $m_brand_id, $m_categories_id, $m_quantity, $m_rate, $m_active, $m_status)
    {
      $this->product_id = $m_id;
      $this->product_name = $m_name;
      $this->produc_image = $m_image;
      $this->brand_id = $m_brand_id; 
      $this->categories_id = $m_categories_id;
      $this->quantity = $m_quantity;
      $this->rate = $m_rate;
      $this->active = $m_active;
      $this->status = $m_status;
    }


    public static function loadAllProducts()
    {
        $arr = array();
        $sql = "select * from product";
        $list = DataProvider::execQuery($sql);
        while ($row = mysqli_fetch_array($list)) {

          $sp = new SanPham($row["product_id"], $row["product_name"], $row["product_image"], $row["brand_id"], $row["categories_id"], $row["quantity"], $row["rate"], $row["active"], $row["status"]);
          array_push($arr, $sp);

        }
        return $arr;
    }
}
