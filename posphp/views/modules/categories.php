<?php

if ($_SESSION["profile"] == "Seller") {
    echo '<script>window.location = "home";</script>';
    return;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Category Management</h1>
        <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-success" data-toggle="modal" data-target="#addCategories">
                    <i class="fa fa-plus"></i> Add Categories
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $categories = []; // Replace with actual categories array

                        foreach ($categories as $key => $category) {
                            echo '<tr>
                                    <td>' . ($key + 1) . '</td>
                                    <td class="text-uppercase">' . htmlspecialchars($category['Category']) . '</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary btnEditCategory" idCategory="' . $category["id"] . '" data-toggle="modal" data-target="#editCategories">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-danger btnDeleteCategory" idCategory="' . $category["id"] . '">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                  </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal Add Categories -->
<div id="addCategories" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background: #DD4B39; color: #fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Categories</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                            <input class="form-control input-lg" type="text" name="newCategory" placeholder="Add Category" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Categories -->
<div id="editCategories" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background: #DD4B39; color: #fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Categories</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                            <input class="form-control input-lg" type="text" id="editCategory" name="editCategory" required>
                            <input type="hidden" name="idCategory" id="idCategory" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>