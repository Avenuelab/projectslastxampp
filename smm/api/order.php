<?php
include_once('db_connect.php');
class Order
{
    var $id, $date, $name, $contact, $sub, $vat, $total_amount, $discount, $total, $paid, $due, $type, $payment_status, $order_status;

    function __construct($id, $date, $name, $contact, $sub, $vat, $total_amount, $discount, $total, $paid, $due, $type, $payment_status, $order_status)
    {
      $this->id = $id;
      $this->date = $date;
      $this->name = $name;
      $this->contact = $contact;
      $this->sub = $sub;
      $this->vat = $vat;
      $this->total_amount = $total_amount;
      $this->discount = $discount;
      $this->total = $total;
      $this->paid = $paid;
      $this->due = $due;
      $this->type = $type;
      $this->payment_status = $payment_status;
      $this->order_status = $order_status;
    }

    public static function loadAll()
    {
        $arr = array();
        $sql = "select * from orders";
        $list = DataStock::execQuery($sql);
        while ($row = mysqli_fetch_array($list)) {

          $sp = new Order($row["order_id"], $row["order_date"] ,$row["client_name"], $row["client_contact"], $row["sub_total"], $row["vat"], $row["total_amount"], $row["discount"], $row["grand_total"], $row["paid"], $row["due"], $row["payment_type"], $row["payment_status"], $row["order_status"]);
          array_push($arr, $sp);

        }
        return $arr;
    }

   

}
