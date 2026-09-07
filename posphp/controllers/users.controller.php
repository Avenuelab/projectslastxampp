<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// USER LOGIN
if (isset($_POST["user"])) {
    $username = $_POST["user"];
    $password = $_POST["password"];

    // Validate username and password format
    if (preg_match('/^[a-zA-Z0-9]+$/', $username) && 
        preg_match('/^[a-zA-Z0-9]+$/', $password)) {
        
        $table = 'users';
        $item = 'user';
        $value = $username;

        // Fetch user details from the model
        $answer = UsersModel::MdlShowUsers($table, $item, $value);

        // Check if user exists and verify password
        if ($answer && password_verify($password, $answer["password"])) {
            if ($answer["status"] == 1) {
                // Set session variables
                $_SESSION["loggedIn"] = "ok";
                $_SESSION["id"] = $answer["id"];
                $_SESSION["name"] = $answer["name"];
                $_SESSION["user"] = $answer["user"];
                $_SESSION["photo"] = $answer["photo"];
                $_SESSION["profile"] = $answer["profile"];

                // Update last login time
                date_default_timezone_set("America/Bogota");
                $actualDate = date('Y-m-d H:i:s');
                UsersModel::mdlUpdateUser($table, "lastLogin", $actualDate, "id", $answer["id"]);

                echo '<script>window.location = "home";</script>';
            } else {
                echo '<br><div class="alert alert-danger">User is deactivated</div>';
            }
        } else {
            echo '<br><div class="alert alert-danger">User or password incorrect</div>';
        }
    }
}

// CREATE USER
if (isset($_POST["newUser"])) {
    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newName"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["newUser"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["newPasswd"])) {

        // Validate image upload
        $photo = "";
        if (isset($_FILES["newPhoto"]["tmp_name"])) {
            // Image processing logic here
        }

        $table = 'users';
        $encryptpass = password_hash($_POST["newPasswd"], PASSWORD_DEFAULT);

        $data = array(
            'name' => $_POST["newName"],
            'user' => $_POST["newUser"],
            'password' => $encryptpass,
            'profile' => $_POST["newProfile"],
            'photo' => $photo
        );

        $answer = UsersModel::mdlAddUser($table, $data);

        if ($answer === 'ok') {
            echo '<script>
                swal({
                    type: "success",
                    title: "User added successfully!",
                    showConfirmButton: true,
                    confirmButtonText: "Close"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "users";
                    }
                });
            </script>';
        }
    } else {
        echo '<script>
            swal({
                type: "error",
                title: "No special characters or blank fields",
                showConfirmButton: true,
                confirmButtonText: "Close"
            }).then(function(result) {
                if (result.value) {
                    window.location = "users";
                }
            });
        </script>';
    }
}

// ADDITIONAL USER FUNCTIONS (EDIT, DELETE, SHOW)
// Similar logic can be implemented for editing and deleting users based on your requirements.
?>