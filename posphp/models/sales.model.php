<?php

require_once 'connection.php';

// SHOW SALES
function showSales($table, $item = null, $value = null) {
    if ($item != null) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id ASC");
        $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    } else {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

// ADD SALE
function addSale($table, $data) {
    $stmt = Connection::connect()->prepare("INSERT INTO $table(code, idCustomer, idSeller, products, tax, netPrice, totalPrice, paymentMethod) VALUES (:code, :idCustomer, :idSeller, :products, :tax, :netPrice, :totalPrice, :paymentMethod)");
    
    $stmt->bindParam(":code", $data["code"], PDO::PARAM_INT);
    $stmt->bindParam(":idCustomer", $data["idCustomer"], PDO::PARAM_INT);
    $stmt->bindParam(":idSeller", $data["idSeller"], PDO::PARAM_INT);
    $stmt->bindParam(":products", $data["products"], PDO::PARAM_STR);
    $stmt->bindParam(":tax", $data["tax"], PDO::PARAM_STR);
    $stmt->bindParam(":netPrice", $data["netPrice"], PDO::PARAM_STR);
    $stmt->bindParam(":totalPrice", $data["totalPrice"], PDO::PARAM_STR);
    $stmt->bindParam(":paymentMethod", $data["paymentMethod"], PDO::PARAM_STR);

    return $stmt->execute() ? "ok" : "error";
}

// EDIT SALE
function editSale($table, $data) {
    $stmt = Connection::connect()->prepare("UPDATE $table SET idCustomer = :idCustomer, idSeller = :idSeller, products = :products, tax = :tax, netPrice = :netPrice, totalPrice = :totalPrice, paymentMethod = :paymentMethod WHERE code = :code");
    
    $stmt->bindParam(":code", $data["code"], PDO::PARAM_INT);
    $stmt->bindParam(":idCustomer", $data["idCustomer"], PDO::PARAM_INT);
    $stmt->bindParam(":idSeller", $data["idSeller"], PDO::PARAM_INT);
    $stmt->bindParam(":products", $data["products"], PDO::PARAM_STR);
    $stmt->bindParam(":tax", $data["tax"], PDO::PARAM_STR);
    $stmt->bindParam(":netPrice", $data["netPrice"], PDO::PARAM_STR);
    $stmt->bindParam(":totalPrice", $data["totalPrice"], PDO::PARAM_STR);
    $stmt->bindParam(":paymentMethod", $data["paymentMethod"], PDO::PARAM_STR);

    return $stmt->execute() ? "ok" : "error";
}

// DELETE SALE
function deleteSale($table, $data) {
    $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
    $stmt->bindParam(":id", $data, PDO::PARAM_INT);

    return $stmt->execute() ? "ok" : "error";	
}

// SALES DATES RANGE
function salesDatesRange($table, $initialDate, $finalDate) {
    if ($initialDate == null) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll();	
    } elseif ($initialDate == $finalDate) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE saledate LIKE :saledate");
        $stmt->bindParam(":saledate", $finalDate, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    } else {
        $finalDatePlusOne = (new DateTime($finalDate))->add(new DateInterval("P1D"))->format("Y-m-d");
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE saledate BETWEEN :initialDate AND :finalDate");
        $stmt->bindParam(":initialDate", $initialDate, PDO::PARAM_STR);
        $stmt->bindParam(":finalDate", $finalDatePlusOne, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

// ADDING TOTAL SALES
function addingTotalSales($table) {	
    $stmt = Connection::connect()->prepare("SELECT SUM(netPrice) as total FROM $table");
    $stmt->execute();
    return $stmt->fetch();
}