<?php

// SHOW PRODUCTS
function showProducts($item, $value, $order) {
    $table = "products";
    return ProductsModel::mdlShowProducts($table, $item, $value, $order);
}

// CREATE PRODUCT
if (isset($_POST["newDescription"])) {
    if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newDescription"]) &&
        preg_match('/^[0-9]+$/', $_POST["newStock"]) &&    
        preg_match('/^[0-9.]+$/', $_POST["newBuyingPrice"]) &&
        preg_match('/^[0-9.]+$/', $_POST["newSellingPrice"])
    ) {
        $route = "views/img/products/default/anonymous.png";

        if (isset($_FILES["newProdPhoto"]["tmp_name"])) {
            list($width, $height) = getimagesize($_FILES["newProdPhoto"]["tmp_name"]);
            $newWidth = 500;
            $newHeight = 500;

            $folder = "views/img/products/" . $_POST["newCode"];
            mkdir($folder, 0755);

            $random = mt_rand(100, 999);
            if ($_FILES["newProdPhoto"]["type"] == "image/jpeg") {
                $route = "views/img/products/" . $_POST["newCode"] . "/" . $random . ".jpg";
                $origin = imagecreatefromjpeg($_FILES["newProdPhoto"]["tmp_name"]);
            } elseif ($_FILES["newProdPhoto"]["type"] == "image/png") {
                $route = "views/img/products/" . $_POST["newCode"] . "/" . $random . ".png";
                $origin = imagecreatefrompng($_FILES["newProdPhoto"]["tmp_name"]);
            }

            $destiny = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            if ($_FILES["newProdPhoto"]["type"] == "image/jpeg") {
                imagejpeg($destiny, $route);
            } else {
                imagepng($destiny, $route);
            }
        }

        $table = "products";
        $data = array(
            "idCategory" => $_POST["newCategory"],
            "code" => $_POST["newCode"],
            "description" => $_POST["newDescription"],
            "stock" => $_POST["newStock"],
            "buyingPrice" => $_POST["newBuyingPrice"],
            "sellingPrice" => $_POST["newSellingPrice"],
            "image" => $route
        );

        $answer = ProductsModel::mdlAddProduct($table, $data);
        if ($answer == "ok") {
            echo '<script>
                swal({
                    type: "success",
                    title: "The Product has been added successfully",
                    showConfirmButton: true,
                    confirmButtonText: "Close"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "products";
                    }
                });
            </script>';
        }
    } else {
        echo '<script>
            swal({
                type: "error",
                title: "The Product cannot be empty or contain special characters!",
                showConfirmButton: true,
                confirmButtonText: "Close"
            }).then(function(result) {
                if (result.value) {
                    window.location = "products";
                }
            });
        </script>';
    }
}

// EDIT PRODUCT
if (isset($_POST["editDescription"])) {
    if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"]) &&
        preg_match('/^[0-9]+$/', $_POST["editStock"]) &&    
        preg_match('/^[0-9.]+$/', $_POST["editBuyingPrice"]) &&
        preg_match('/^[0-9.]+$/', $_POST["editSellingPrice"])
    ) {
        $route = $_POST["currentImage"];
        if (isset($_FILES["editImage"]["tmp_name"]) && !empty($_FILES["editImage"]["tmp_name"])) {
            list($width, $height) = getimagesize($_FILES["editImage"]["tmp_name"]);
            $newWidth = 500;
            $newHeight = 500;
            $folder = "views/img/products/" . $_POST["editCode"];

            if (!empty($_POST["currentImage"]) && $_POST["currentImage"] != "views/img/products/default/anonymous.png") {
                unlink($_POST["currentImage"]);
            } else {
                mkdir($folder, 0755);    
            }

            $random = mt_rand(100, 999);
            if ($_FILES["editImage"]["type"] == "image/jpeg") {
                $route = "views/img/products/" . $_POST["editCode"] . "/" . $random . ".jpg";
                $origin = imagecreatefromjpeg($_FILES["editImage"]["tmp_name"]);
            } elseif ($_FILES["editImage"]["type"] == "image/png") {
                $route = "views/img/products/" . $_POST["editCode"] . "/" . $random . ".png";
                $origin = imagecreatefrompng($_FILES["editImage"]["tmp_name"]);
            }

            $destiny = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            if ($_FILES["editImage"]["type"] == "image/jpeg") {
                imagejpeg($destiny, $route);
            } else {
                imagepng($destiny, $route);
            }
        }

        $table = "products";
        $data = array(
            "idCategory" => $_POST["editCategory"],
            "code" => $_POST["editCode"],
            "description" => $_POST["editDescription"],
            "stock" => $_POST["editStock"],
            "buyingPrice" => $_POST["editBuyingPrice"],
            "sellingPrice" => $_POST["editSellingPrice"],
            "image" => $route
        );

        $answer = ProductsModel::mdlEditProduct($table, $data);
        if ($answer == "ok") {
            echo '<script>
                swal({
                    type: "success",
                    title: "The product has been updated",
                    showConfirmButton: true,
                    confirmButtonText: "Close"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "products";
                    }
                });
            </script>';
        }
    } else {
        echo '<script>
            swal({
                type: "error",
                title: "The Product cannot be empty or contain special characters!",
                showConfirmButton: true,
                confirmButtonText: "Close"
            }).then(function(result) {
                if (result.value) {
                    window.location = "products";
                }
            });
        </script>';
    }
}

// DELETE PRODUCT
if (isset($_GET["idProduct"])) {
    $table = "products";
    $datum = $_GET["idProduct"];

    if ($_GET["image"] != "" && $_GET["image"] != "views/img/products/default/anonymous.png") {
        unlink($_GET["image"]);
        rmdir('views/img/products/' . $_GET["code"]);
    }

    $answer = ProductsModel::mdlDeleteProduct($table, $datum);
    if ($answer == "ok") {
        echo '<script>
            swal({
                type: "success",
                title: "The Product has been successfully deleted",
                showConfirmButton: true,
                confirmButtonText: "Close"
            }).then(function(result) {
                if (result.value) {
                    window.location = "products";
                }
            });
        </script>';
    }        
}

// SHOW ADDING OF THE SALES
function showAddingOfTheSales() {
    $table = "products";
    return ProductsModel::mdlShowAddingOfTheSales($table);
}