<?php

require_once "connection.php";

// Function to show users
function showUsers($tableUsers, $item = null, $value = null) {
    $db = Connection::connect();
    
    if ($item) {
        $stmt = $db->prepare("SELECT * FROM $tableUsers WHERE $item = :$item");
        $stmt->bindParam(":$item", $value, PDO::PARAM_STR);
    } else {
        $stmt = $db->prepare("SELECT * FROM $tableUsers");
    }

    $stmt->execute();
    return $item ? $stmt->fetch() : $stmt->fetchAll();
}

// Function to add a user
function addUser($table, $data) {
    $stmt = Connection::connect()->prepare("INSERT INTO $table(name, user, password, profile, photo) VALUES (:name, :user, :password, :profile, :photo)");

    $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $stmt->bindParam(":profile", $data["profile"], PDO::PARAM_STR);
    $stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);

    return $stmt->execute() ? 'ok' : 'error';
}

// Function to edit a user
function editUser($table, $data) {
    $stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, password = :password, profile = :profile, photo = :photo WHERE user = :user");

    $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $stmt->bindParam(":profile", $data["profile"], PDO::PARAM_STR);
    $stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);

    return $stmt->execute() ? 'ok' : 'error';
}

// Function to update user
function updateUser($table, $item1, $value1, $item2, $value2) {
    $stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

    $stmt->bindParam(":$item1", $value1, PDO::PARAM_STR);
    $stmt->bindParam(":$item2", $value2, PDO::PARAM_STR);

    return $stmt->execute() ? 'ok' : 'error';
}

// Function to delete a user
function deleteUser($table, $id) {
    $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    return $stmt->execute() ? 'ok' : 'error';
}
?>