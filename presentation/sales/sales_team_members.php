<?php 
error_reporting (E_ALL ^ E_NOTICE);
// Toggle this to change the setting
define('DEBUG', true);

// You want all errors to be triggered
error_reporting(E_ALL);
 
error_reporting(E_ERROR | E_PARSE);

ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>

<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<?php 

$username = $_SESSION['username'];

$day = null;
$sales_member = null;

$facebook = 0;
$instagram = 0;
$lazada = 0;
$shoppe = 0;
$tokopedia = 0;
$amazon_com = 0;
$amazon_uk = 0;
$tiktok = 0;
$jiji_ng = 0;
$jiji_co_ke = 0;
$google = 0;
$pcexpoters = 0;
$jumia = 0;
$thebrokersite = 0;

$search_keyword_1 = null;
$search_keyword_2 = null;
$search_keyword_3 = null;
$search_keyword_4 = null;
$search_keyword_5 = null;

$customer_create_model_1 = null;
$customer_create_model_2 = null;
$customer_create_model_3 = null;
$customer_create_model_4 = null;
$customer_create_model_5 = null;
$customer_create_model_6 = null;
$customer_create_model_7 = null;
$customer_create_model_8 = null;
$customer_create_model_9 = null;
$customer_create_model_10 = null;

$thebrokersite1 = 0;
$pcexporters1 = 0;
$facebook1 = 0;

$platform_create_model_1 = null;
$platform_create_model_2 = null;
$platform_create_model_3 = null;
$platform_create_model_4 = null;
$platform_create_model_5 = null;
$platform_create_model_6 = null;
$platform_create_model_7 = null;
$platform_create_model_8 = null;
$platform_create_model_9 = null;
$platform_create_model_10 = null;

$selected_date = null;
$sales_member_name = null;
$member_id = null;

$returive_sales = "SELECT * FROM weekly_sales_set_target ORDER BY id DESC LIMIT 1";
$query_set = mysqli_query($connection, $returive_sales);
foreach($query_set as $q){
    $selected_date = $q['day'];
    $sales_member_name = $q['sales_member'];
    $member_id = $q['id'];
}

if(isset($_POST['get_user'])){
    $day = mysqli_real_escape_string($connection, $_POST['day']);
    $sales_member = mysqli_real_escape_string($connection, $_POST['sales_member']);

    $qd = "INSERT INTO `weekly_sales_set_target`(`day`, `sales_member`, `created_by`, `epf`) VALUES ('{$day}', '{$sales_member}', '{$username}', '{$epf}')";
    $q_run = mysqli_query($connection, $qd);
    echo "<script>
            $(window).load(function() {
                $('#create_search').modal('show');
            });
        </script>";
}


if(isset($_POST['posting_customer_test'])){

    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $lazada = $_POST['lazada'];
    $shoppe = $_POST['shoppe'];
    $tokopedia = $_POST['tokopedia'];
    $amazon_com = $_POST['amazon_com'];
    $amazon_uk = $_POST['amazon_uk'];
    $tiktok = $_POST['tiktok'];
    $jiji_ng = $_POST['jiji_ng'];
    $jiji_co_ke = $_POST['jiji_co_ke'];
    $google = $_POST['google'];
    $pcexpoters = $_POST['pcexpoters'];
    $jumia = $_POST['jumia'];
    $thebrokersite = $_POST['thebrokersite'];
    $search_keyword_1 = $_POST['search_keyword_1'];
    $search_keyword_2 = $_POST['search_keyword_2'];
    $search_keyword_3 = $_POST['search_keyword_3'];
    $search_keyword_4 = $_POST['search_keyword_4'];
    $search_keyword_5 = $_POST['search_keyword_5'];
    $customer_target_qty = $_POST['customer_target_qty'];
    $_POST['posting_customer_test']='';

    $query = "INSERT INTO `weekly_sales_set_create_search_customer`(`day`, `sales_member`, `search_keyword_1`, `search_keyword_2`, `search_keyword_3`, `search_keyword_4`, `search_keyword_5`, `customer_target_qty`, 
                                            `facebook`, `instagram`, `lazada`, `shoppe`, `tokopedia`, `amazon.com`, `amazon.uk`, `tiktok`, `jiji.ng`, `jiji.co.ke`, `google`, `pcexporters`, `jumia`, `thebrokersite`, 
                                            `created_by`, `member_id`) 
                        VALUES ('{$selected_date}', '{$sales_member_name}', '{$search_keyword_1}', '{$search_keyword_2}', '{$search_keyword_3}','{$search_keyword_4}', '{$search_keyword_5}', '{$customer_target_qty}', '{$facebook}', 
                        '{$instagram}', '{$lazada}', '{$shoppe}', '{$tokopedia}', '{$amazon_com}', '{$amazon_uk}', '{$tiktok}', '{$jiji_ng}', '{$jiji_co_ke}', '{$google}', '{$pcexpoters}', '{$jumia}',
                        '{$thebrokersite}', '{$username}', '{$member_id}')";
                     if($customer_target_qty !=null ){
        $query_run = mysqli_query($connection, $query);
        $customer_target_qty = null;
        
        echo "<script>
            $(window).load(function() {
                $('#posting_modal').modal('show');
            });
                    
        </script>";
    }
}

if(isset($_POST['posting_modal'])){
    $customer_create_model_1 = $_POST['customer_create_model_1'];
    $customer_create_model_2 = $_POST['customer_create_model_2'];
    $customer_create_model_3 = $_POST['customer_create_model_3'];
    $customer_create_model_4 = $_POST['customer_create_model_4'];
    $customer_create_model_5 = $_POST['customer_create_model_5'];
    $customer_create_model_6 = $_POST['customer_create_model_6'];
    $customer_create_model_7 = $_POST['customer_create_model_7'];
    $customer_create_model_8 = $_POST['customer_create_model_8'];
    $customer_create_model_9 = $_POST['customer_create_model_9'];
    $customer_create_model_10 = $_POST['customer_create_model_10'];
    $thebrokersite1 = $_POST['thebrokersite1'];
    $pcexporters1 = $_POST['pcexporters1'];
    $facebook1 = $_POST['facebook1'];
    $platform_create_model_1 = $_POST['platform_create_model_1'];
    $platform_create_model_2 = $_POST['platform_create_model_2'];
    $platform_create_model_3 = $_POST['platform_create_model_3'];
    $platform_create_model_4 = $_POST['platform_create_model_4'];
    $platform_create_model_5 = $_POST['platform_create_model_5'];
    $platform_create_model_6 = $_POST['platform_create_model_6'];
    $platform_create_model_7 = $_POST['platform_create_model_7'];
    $platform_create_model_8 = $_POST['platform_create_model_8'];
    $platform_create_model_9 = $_POST['platform_create_model_9'];
    $platform_create_model_10 = $_POST['platform_create_model_10'];

    $d_run = "INSERT INTO `weekly_sales_set_posting_to_customer`(`customer_create_model_1`, `customer_create_model_2`, `customer_create_model_3`, `customer_create_model_4`, `customer_create_model_5`, 
                        `customer_create_model_6`, `customer_create_model_7`, `customer_create_model_8`, `customer_create_model_9`, `customer_create_model_10`, `thebrokersite1`, `pcexporters1`, `facebook1`,
                        `platform_create_model_1`, `platform_create_model_2`, `platform_create_model_3`, `platform_create_model_4`, `platform_create_model_5`, `platform_create_model_6`, `platform_create_model_7`, 
                        `platform_create_model_8`, `platform_create_model_9`, `platform_create_model_110`, `sales_member`, `day`, `created_by`, `member_id`) 
            VALUES('{$customer_create_model_1}', '{$customer_create_model_2}', '{$customer_create_model_3}', '{$customer_create_model_4}', '{$customer_create_model_5}', '{$customer_create_model_6}', '{$customer_create_model_7}',
                    '{$customer_create_model_8}', '{$customer_create_model_9}', '{$customer_create_model_10}', '{$thebrokersite1}', '{$pcexporters1}', '{$facebook1}', '{$platform_create_model_1}', '{$platform_create_model_2}',
                    '{$platform_create_model_3}', '{$platform_create_model_4}', '{$platform_create_model_5}', '{$platform_create_model_6}', '{$platform_create_model_7}', '{$platform_create_model_8}', '{$platform_create_model_9}',
                    '{$platform_create_model_10}', '{$sales_member_name}', '{$selected_date}', '{$username}', '{$member_id}')";
    $run_q = mysqli_query($connection, $d_run);

    if($run_q){
        echo "<script>
            $(window).load(function() {
                $('#posting_modal').modal('hide');
            })
        </script>";
    }

}


?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-warehouse" aria-hidden="true"></i></h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <form action="" method="POST">
                <div class="row">
                    <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs nav-pills nav-stacked" id="tab1" role="tablist">
                                <li class="nav-item text-center" style="width: 150px;">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                        aria-selected="true" style="color: #fff;">Monday</a>
                                </li>
                                <li class="nav-item text-center" style="width: 150px;">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-profile" role="tab"
                                        aria-controls="custom-tabs-four-profile" aria-selected="false"
                                        style="color: #fff;">Tuesday</a>
                                </li>

                                <li class="nav-item text-center" style="width: 150px;">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-tab4" role="tab" aria-controls="custom-tabs-four-tab4"
                                        aria-selected="false" style="color: #fff;">Wednesday</a>
                                </li>
                                <li class="nav-item text-center" style="width: 150px;">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-tab5" role="tab" aria-controls="custom-tabs-four-tab5"
                                        aria-selected="false" style="color: #fff;">Thursday</a>
                                </li>
                                <li class="nav-item text-center" style="width: 150px;">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-tab6" role="tab" aria-controls="custom-tabs-four-tab6"
                                        aria-selected="false" style="color: #fff;">Friday</a>
                                </li>
                                <li class="nav-item text-center" style="width: 150px;">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-tab7" role="tab" aria-controls="custom-tabs-four-tab7"
                                        aria-selected="false" style="color: #fff;">Saturday</a>
                                </li>
                                <li class="nav-item text-center" style="width: 150px;">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-tab8" role="tab" aria-controls="custom-tabs-four-tab8"
                                        aria-selected="false" style="color: #fff;">Sunday</a>
                                </li>

                            </ul>
                        </div>
                        <div class=" card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <!-- ============================================================== -->
                                <!-- Monday  -->
                                <!-- ============================================================== -->
                                <div class="tab-pane active" id="custom-tabs-four-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-home-tab">
                                    <div class="row">
                                        <table class="table table-striped mx-auto" style="width: 97%;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Day</th>
                                                    <th>Member</th>
                                                    <th>Task Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form method="POST">
                                                    <td>#</td>
                                                    <td>
                                                        <input type="text" class="day" name="day" value="Monday"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <select class="" name="sales_member" style="border-radius: 5px;"
                                                            required>
                                                            <option value="" selected>--Select Sales Member--</option>
                                                            <?php
                                                                $query = "SELECT full_name, emp_id FROM employees WHERE department = '5' ORDER BY 'full_name' ASC";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                    $user_full_name = $x['full_name'];
                                                            ?>
                                                            <option value="<?php echo $x['emp_id'];?>">
                                                                <?php echo $x["full_name"]; ?>
                                                            </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="get_user"
                                                            class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#create_search">Create & Search
                                                            Customer</button>
                                                        <button type="submit" name="get_user"
                                                            class="btn btn-sm btn-success" data-toggle="modal"
                                                            data-target="#posting_modal">Posting to Customer</button>
                                                    </td>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- ============================================================== -->
                                <!-- Tuesday  -->
                                <!-- ============================================================== -->
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-profile-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Day</th>
                                                <th>Member</th>
                                                <th>Task Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="POST">
                                                <td>#</td>
                                                <td>
                                                    <input type="text" class="day" name="day" value="Tuesday" readonly>
                                                </td>
                                                <td>
                                                    <select class="" name="sales_member" style="border-radius: 5px;"
                                                        required>
                                                        <option value="" selected>--Select Sales Member--</option>
                                                        <?php
                                                                $query = "SELECT full_name, emp_id FROM employees WHERE department = '5' ORDER BY 'full_name' ASC";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                    $user_full_name = $x['full_name'];
                                                            ?>
                                                        <option value="<?php echo $x['emp_id'];?>">
                                                            <?php echo $x["full_name"]; ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-primary"
                                                        data-toggle="modal" data-target="#create_search">Create & Search
                                                        Customer</button>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-success"
                                                        data-toggle="modal" data-target="#posting_modal">Posting to
                                                        Customer</button>
                                                </td>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- ============================================================== -->
                                <!-- Wednesday  -->
                                <!-- ============================================================== -->
                                <div class="tab-pane fade" id="custom-tabs-four-tab4" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-tab4-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Day</th>
                                                <th>Member</th>
                                                <th>Task Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="POST">
                                                <td>#</td>
                                                <td>
                                                    <input type="text" class="day" name="day" value="Wednesday"
                                                        readonly>
                                                </td>
                                                <td>
                                                    <select class="" name="sales_member" style="border-radius: 5px;"
                                                        required>
                                                        <option value="" selected>--Select Sales Member--</option>
                                                        <?php
                                                                $query = "SELECT full_name, emp_id FROM employees WHERE department = '5' ORDER BY 'full_name' ASC";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                    $user_full_name = $x['full_name'];
                                                            ?>
                                                        <option value="<?php echo $x['emp_id'];?>">
                                                            <?php echo $x["full_name"]; ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-primary"
                                                        data-toggle="modal" data-target="#create_search">Create & Search
                                                        Customer</button>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-success"
                                                        data-toggle="modal" data-target="#posting_modal">Posting to
                                                        Customer</button>
                                                </td>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- ============================================================== -->
                                <!-- Thursday  -->
                                <!-- ============================================================== -->
                                <div class="tab-pane fade" id="custom-tabs-four-tab5" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-tab5-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Day</th>
                                                <th>Member</th>
                                                <th>Task Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="POST">
                                                <td>#</td>
                                                <td>
                                                    <input type="text" class="day" name="day" value="Thursday" readonly>
                                                </td>
                                                <td>
                                                    <select class="" name="sales_member" style="border-radius: 5px;"
                                                        required>
                                                        <option value="" selected>--Select Sales Member--</option>
                                                        <?php
                                                                $query = "SELECT full_name, emp_id FROM employees WHERE department = '5' ORDER BY 'full_name' ASC";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                    $user_full_name = $x['full_name'];
                                                            ?>
                                                        <option value="<?php echo $x['emp_id'];?>">
                                                            <?php echo $x["full_name"]; ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-primary"
                                                        data-toggle="modal" data-target="#create_search">Create & Search
                                                        Customer</button>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-success"
                                                        data-toggle="modal" data-target="#posting_modal">Posting to
                                                        Customer</button>
                                                </td>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- ============================================================== -->
                                <!-- Friday  -->
                                <!-- ============================================================== -->
                                <div class="tab-pane fade" id="custom-tabs-four-tab6" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-tab6-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Day</th>
                                                <th>Member</th>
                                                <th>Task Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="POST">
                                                <td>#</td>
                                                <td>
                                                    <input type="text" class="day" name="day" value="Friday" readonly>
                                                </td>
                                                <td>
                                                    <select class="" name="sales_member" style="border-radius: 5px;"
                                                        required>
                                                        <option value="" selected>--Select Sales Member--</option>
                                                        <?php
                                                                $query = "SELECT full_name, emp_id FROM employees WHERE department = '5' ORDER BY 'full_name' ASC";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                    $user_full_name = $x['full_name'];
                                                            ?>
                                                        <option value="<?php echo $x['emp_id'];?>">
                                                            <?php echo $x["full_name"]; ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-primary"
                                                        data-toggle="modal" data-target="#create_search">Create & Search
                                                        Customer</button>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-success"
                                                        data-toggle="modal" data-target="#posting_modal">Posting to
                                                        Customer</button>
                                                </td>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- ============================================================== -->
                                <!-- Saturday -->
                                <!-- ============================================================== -->
                                <div class="tab-pane fade" id="custom-tabs-four-tab7" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-tab7-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Day</th>
                                                <th>Member</th>
                                                <th>Task Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="POST">
                                                <td>#</td>
                                                <td>
                                                    <input type="text" class="day" name="day" value="Saturday" readonly>
                                                </td>
                                                <td>
                                                    <select class="" name="sales_member" style="border-radius: 5px;"
                                                        required>
                                                        <option value="" selected>--Select Sales Member--</option>
                                                        <?php
                                                                $query = "SELECT full_name, emp_id FROM employees WHERE department = '5' ORDER BY 'full_name' ASC";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                    $user_full_name = $x['full_name'];
                                                            ?>
                                                        <option value="<?php echo $x['emp_id'];?>">
                                                            <?php echo $x["full_name"]; ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-primary"
                                                        data-toggle="modal" data-target="#create_search">Create & Search
                                                        Customer</button>
                                                    <button type="submit" name="get_user" class="btn btn-sm btn-success"
                                                        data-toggle="modal" data-target="#posting_modal">Posting to
                                                        Customer</button>
                                                </td>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- ============================================================== -->
                                <!-- Sunday  -->
                                <!-- ============================================================== -->
                                <div class="tab-pane fade" id="custom-tabs-four-tab8" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-tab8-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Day</th>
                                                <th>Member</th>
                                                <th>Task Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <form method="POST">
                                                    <td>#</td>
                                                    <td>
                                                        <input type="text" class="day" name="day" value="Sunday"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <select class="" name="sales_member" style="border-radius: 5px;"
                                                            required>
                                                            <option value="" selected>--Select Sales Member--</option>
                                                            <?php
                                                                $query = "SELECT full_name, emp_id FROM employees WHERE department = '5' ORDER BY 'full_name' ASC";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                    $user_full_name = $x['full_name'];
                                                            ?>
                                                            <option value="<?php echo $x['emp_id'];?>">
                                                                <?php echo $x["full_name"]; ?>
                                                            </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="get_user"
                                                            class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#create_search">Create & Search
                                                            Customer</button>
                                                        <button type="submit" name="get_user"
                                                            class="btn btn-sm btn-success" data-toggle="modal"
                                                            data-target="#posting_modal">Posting to Customer</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit_weekly_task" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="create_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create & Search Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Platform</th>
                                <th>Search Key Word</th>
                                <th>Target Customer QTY</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#</td>

                                <td class="d-block">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="facebook" name="facebook" value="1">
                                        <label class="label_values text-capitalize" for="facebook">Facebook</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="instagram" name="instagram" value="1">
                                        <label class="label_values text-capitalize" for="instagram">Instagram</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="lazada" name="lazada" value="1">
                                        <label class="label_values text-capitalize" for="lazada">lazada</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="shoppe" name="shoppe" value="1">
                                        <label class="label_values text-capitalize" for="shoppe">Shoppe</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="tokopedia" name="tokopedia" value="1">
                                        <label class="label_values text-capitalize" for="tokopedia">Tokopedia</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="amazon_com" name="amazon_com" value="1">
                                        <label class="label_values text-capitalize" for="amazon_com">Amazon.com</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="amazon_uk" name="amazon_uk" value="1">
                                        <label class="label_values text-capitalize" for="amazon_uk">Amazon.uk</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="tiktok" name="tiktok" value="1">
                                        <label class="label_values text-capitalize" for="tiktok">Tiktok</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="jiji_ng" name="jiji_ng" value="1">
                                        <label class="label_values text-capitalize" for="jiji_ng">Jiji.ng</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="jiji_co_ke" name="jiji_co_ke" value="1">
                                        <label class="label_values text-capitalize" for="jiji_co_ke">Jiji.co.ke</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="google" name="google" value="1">
                                        <label class="label_values text-capitalize" for="google">Google.com</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="pcexpoters" name="pcexpoters" value="1">
                                        <label class="label_values text-capitalize" for="pcexpoters">PC
                                            Exporters</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="jumia" name="jumia" value="1">
                                        <label class="label_values text-capitalize" for="jumia">Jumia.Com</label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="thebrokersite" name="thebrokersite" value="1">
                                        <label class="label_values text-capitalize"
                                            for="thebrokersite">thebrokersite.com</label>
                                    </div>

                                </td>
                                <td id="myDIV1">
                                    <input type="text" class="form-control" placeholder="Search Keyword 1"
                                        name="search_keyword_1">
                                    <input type="text" class="form-control" placeholder="Search Keyword 2"
                                        name="search_keyword_2">
                                    <input type="text" class="form-control" placeholder="Search Keyword 3"
                                        name="search_keyword_3">
                                    <input type="text" class="form-control" placeholder="Search Keyword 4"
                                        name="search_keyword_4">
                                    <input type="text" class="form-control" placeholder="Search Keyword 5"
                                        name="search_keyword_5">

                                </td>
                                <td>
                                    <input type="number" min='1' max='10' class="form-control" placeholder="Target QTY"
                                        name="customer_target_qty">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="posting_customer_test" onclick="submitForm()"
                        class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="posting_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Posting to Customer</h4>
                    <ul class="nav nav-tabs" id="tab1" role="tablist">
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-customer" role="tab" aria-controls="custom-tabs-four-customer"
                                aria-selected="true" style="color: #fff;">Customer</a>
                            <input type="text" name="posting_customer1" value="customer" class="d-none">

                        </li>
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-platform" role="tab" aria-controls="custom-tabs-four-platform"
                                aria-selected="false" style="color: #fff;">Platform</a>
                            <input type="text" name="posting_customer_platform" value="platform" class="d-none">
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane active" id="custom-tabs-four-customer" role="tabpanel"
                            aria-labelledby="custom-tabs-four-customer-tab">
                            <table class="table table-striped">
                                <h5>Customer</h5>
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Morning
                                            <br>9.00A.M-2.00P.M
                                        </th>
                                        <th>Afternoon
                                            <br>3.00A.M-6.15P.M
                                        </th>
                                        <th>Follow The Order
                                            <br>6.45A.M-9.00P.M
                                        </th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Model 1"
                                                name="customer_create_model_1">
                                            <input type="text" class="form-control" placeholder="Model 2"
                                                name="customer_create_model_2">
                                            <input type="text" class="form-control" placeholder="Model 3"
                                                name="customer_create_model_3">
                                            <input type="text" class="form-control" placeholder="Model 4"
                                                name="customer_create_model_4">
                                            <input type="text" class="form-control" placeholder="Model 5"
                                                name="customer_create_model_5">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Model 1"
                                                name="customer_create_model_6">
                                            <input type="text" class="form-control" placeholder="Model 2"
                                                name="customer_create_model_7">
                                            <input type="text" class="form-control" placeholder="Model 3"
                                                name="customer_create_model_8">
                                            <input type="text" class="form-control" placeholder="Model 4"
                                                name="customer_create_model_9">
                                            <input type="text" class="form-control" placeholder="Model 5"
                                                name="customer_create_model_10">
                                        </td>
                                        <td><span class="badge bg-danger">Please Follow the Order</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade show" id="custom-tabs-four-platform" role="tabpanel"
                            aria-labelledby="custom-tabs-four-platform-tab">
                            <table class="table table-striped">
                                <h5>Platform</h5>
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Platform</th>
                                        <th>Morning
                                            <br>9.00A.M-2.00P.M
                                        </th>
                                        <th>Afternoon
                                            <br>3.00A.M-6.15P.M
                                        </th>
                                        <th>Follow The Order
                                            <br>6.45A.M-9.00P.M
                                        </th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="thebrokersite1" name="thebrokersite1"
                                                    value="1">
                                                <label class="label_values text-capitalize"
                                                    for="thebrokersite1">thebrokersite.com</label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="pcexporters1" name="pcexporters1" value="1">
                                                <label class="label_values text-capitalize"
                                                    for="pcexporters1">pcexporters.com</label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="facebook1" name="facebook1" value="1">
                                                <label class="label_values text-capitalize"
                                                    for="facebook1">facebook</label>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Model 1"
                                                name="platform_create_model_1">
                                            <input type="text" class="form-control" placeholder="Model 2"
                                                name="platform_create_model_2">
                                            <input type="text" class="form-control" placeholder="Model 3"
                                                name="platform_create_model_3">
                                            <input type="text" class="form-control" placeholder="Model 4"
                                                name="platform_create_model_4">
                                            <input type="text" class="form-control" placeholder="Model 5"
                                                name="platform_create_model_5">
                                        </td>

                                        <td>
                                            <input type="text" class="form-control" placeholder="Model 1"
                                                name="platform_create_model_6">
                                            <input type="text" class="form-control" placeholder="Model 2"
                                                name="platform_create_model_7">
                                            <input type="text" class="form-control" placeholder="Model 3"
                                                name="platform_create_model_8">
                                            <input type="text" class="form-control" placeholder="Model 4"
                                                name="platform_create_model_9">
                                            <input type="text" class="form-control" placeholder="Model 5"
                                                name="platform_create_model_10">
                                        </td>
                                        <td><span class="badge bg-danger">Please Follow the Order</span></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="posting_modal" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
[type="text"],
[type="number"] {
    height: 22px;
    margin-top: 4px;
    font-size: 10px;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    padding: 10px;
    font-family: "Poppins", sans-serif;
    color: #fff !important;
}

.day,
[type="text"] {
    color: #000 !important;
}
</style>
<script>
function submitForm() {
    // Get the first form with the name
    // Usually the form name is not repeated
    // but duplicate names are possible in HTML
    // Therefore to work around the issue, enforce the correct index
    var frm = document.getElementsByName('contact-form')[0];
    frm.submit(); // Submit the form
    frm.reset(); // Reset all form data
    return false; // Prevent page refresh
}
</script>


<?php include_once('../includes/footer.php'); ?>