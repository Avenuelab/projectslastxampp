<div class="content-wrapper">

  <section class="content-header">
    <h1>Sales Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <a href="create-sales">
          <button class="btn btn-success">
            <i class="fa fa-plus"></i> Add Sale
          </button>
        </a>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Bill</th>
              <th>Customer</th>
              <th>Seller</th>
              <th>Payment Method</th>
              <th>Net Cost</th>
              <th>Total Cost</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Sample data for demonstration purposes
            $ventas = [
              [
                "codigo" => "001",
                "id_cliente" => 1,
                "id_vendedor" => 1,
                "metodo_pago" => "Credit Card",
                "neto" => 100.00,
                "total" => 120.00,
                "fecha" => "2023-10-10",
                "id" => 1
              ],
              // Add more sales data as needed
            ];

            // Sample customer and seller names
            $clientes = [1 => "John Doe"];
            $vendedores = [1 => "Jane Smith"];

            foreach ($ventas as $key => $value) {
              echo '<tr>
                      <td>' . ($key + 1) . '</td>
                      <td>' . $value["codigo"] . '</td>
                      <td>' . $clientes[$value["id_cliente"]] . '</td>
                      <td>' . $vendedores[$value["id_vendedor"]] . '</td>
                      <td>' . $value["metodo_pago"] . '</td>
                      <td>$ ' . number_format($value["neto"], 2) . '</td>
                      <td>$ ' . number_format($value["total"], 2) . '</td>
                      <td>' . $value["fecha"] . '</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning"><i class="fa fa-print"></i></button>
                          <button class="btn btn-primary btnEditarVenta" idVenta="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarVenta" idVenta="' . $value["id"] . '"><i class="fa fa-trash"></i></button>
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