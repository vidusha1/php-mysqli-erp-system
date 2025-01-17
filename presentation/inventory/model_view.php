<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$brand = $_GET['brand'];
$model = $_GET['model'];

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="./model_summery.php?brand=<?php echo $brand ?>">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-uppercase p-1"><?php echo $brand . ' ' . $model ?></h6>
                </div>
                <div class="card-body">
                    <table id="" class="table table-bordered table-hover">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>core</th>
                                    <th>Generation</th>
                                    <th>In Total</th>
                                    <th>In Stock</th>
                                    <th>Dispatch</th>
                                    <th>Touch Screen Count</th>
                                    <th>Non Touch Count</th>
                                    <th>Touch Wholesale Price</th>
                                    <th>Non Touch Wholesale Price</th>
                                    <th>No Battery Count</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">

                                <?php
// $model = null;
$core = null;
$in_total = null;
$in_stock = null;
$dispatch = null;
$main_stock = null;
$core = '';
$generation = '';
$i = 0;
$a = 0;
$touch_wholesale_price = 0;
$non_touch_wholesale_price = 0;
$query = "SELECT model,generation,core, COUNT(inventory_id) as in_total FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model = '$model'   GROUP BY core";

$result = mysqli_query($connection, $query);
foreach ($result as $data) {
    $model = $data['model'];
    $core = $data['core'];
    $generation = $data['generation'];
    $in_total = $data['in_total'];
    $i++;
    $a++;
    echo "
                                    <tr class='cell-1' data-toggle='collapse'   >
                                    <td>$i</td>
                                    <td>$brand</td>
                                    <td>$model</td>
                                    <td>$core</td>
                                    <td>$generation</td>
                                    <td>$in_total</td>
                                    ";
    echo "<td>";
    $query = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND send_to_production='0'";

    $result = mysqli_query($connection, $query);
    foreach ($result as $data) {
        $in_stock = $data['in_stock'];

    }
    $query = "SELECT COUNT(inventory_id)as dispatch FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND send_to_production='1'";
    $result = mysqli_query($connection, $query);
    foreach ($result as $data) {
        $dispatch = $data['dispatch'];
    }
    $available = $in_stock - $dispatch;
    echo $in_stock;
    echo "</td>
                                    <td>";

    echo $dispatch;
    echo "
                                    </td>";
    echo "<td>";
    $query = "SELECT non_touch_wholesale_price, COUNT(touch_or_non_touch)as touch_or_non_touch
                                            FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND dispatch='0' AND touch_or_non_touch='yes'";

    $result = mysqli_query($connection, $query);
    foreach ($result as $data) {
        $touch_or_non_touch = $data['touch_or_non_touch'];
        $non_touch_wholesale_price = $data['non_touch_wholesale_price'];

    }
    echo $touch_or_non_touch;
    echo "</td>";
    $no_touch = $in_stock - $touch_or_non_touch;
    echo "<td>" . $no_touch . "</td>";
    echo "<td>" . $non_touch_wholesale_price . "</td>";

    $query = "SELECT touch_wholesale_price, COUNT(battery)as battery FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND dispatch='0' AND battery='no'";
    $result = mysqli_query($connection, $query);
    foreach ($result as $data) {
        $battery = $data['battery'];
        $touch_wholesale_price = $data['touch_wholesale_price'];

    }
    echo "<td>$touch_wholesale_price </td>";
    echo "<td>$battery </td>";
    echo "</td>";

    echo "
                                    <td class='text-center'>
                                            <a class='btn btn-xs bg-primary '
                                                href='spec_view.php?model=$model&brand=$brand&core=$core'><i class='fas fa-eye'></i>
                                            </a>
                                        </td>
                                </tr>";
  ?>
                                <?php }?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<style>
.modal-header {
    display: block;
}

.modal-content {
    margin-top: 8rem;
}


.cell-1 {
    border-collapse: separate;
    border-spacing: 0 4em;
    background: #ffffff;
    border-bottom: 5px solid transparent;
    /*background-color: gold;*/
    background-clip: padding-box;
    cursor: pointer;

}

.table-elipse {
    cursor: pointer;
}

#demo {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s 0.1s ease-in-out;
    transition: all 0.3s ease-in-out;
    width: 100%;
}

.row-child {
    background-color: #000;
    color: #fff;
    width: 400px !important;
}
</style>

<?php include_once '../includes/footer.php';?>