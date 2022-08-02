<?php
global $wpdb;
$table_name = $wpdb->prefix . 'users_table';

if (isset($_GET['edit'])) {
    // $upt_id = $_GET['id'];
    $result = $wpdb->get_results("SELECT * FROM $table_name WHERE id='3'");
    // $result2 = $wpdb->get_results("SELECT * FROM $table_name1 WHERE id=3");

    foreach ($result as $print) {
        $name = $print->pack_name;
        $pack_type = $print->pack_type;
        $pack_label = $print->label;
        $pack_cat = $print->category;
    }


    echo "
            <form id='edit-form' method='post'>
                <div class='user-details'>
                    <div class='input-box'>
                        <label for='pack_name' class='details'>Pack Name</label>
                        <input type='text' name='pack_name' value=' $print->pack_name'>
                    </div>
                    <div class='input-box'>
                        <label for='pack_type' class='details'>Pack Type</label>
                        <input type='var' name='pack_type' value='$print->pack_type'>
                    </div>
                    <div class='input-box'>
                        <label for='pack_label' class='details'>Pack Label</label>
                        <input type='text' name='pack_label' value='$print->label'>
                    </div>
                    <div class='input-box'>
                        <label for='pack_cat' class='details'>Pack Category</label>
                        <input type='text' name='pack_cat' value='$print->category'>
                    </div>

                </div>
                <div class='buttons'>
                    <input type='submit' id='update-details' name='update-details' value='Update'>
                </div>
            </form>";
} ?>


<?php
if (isset($_GET['edit'])) {
    // $upt_id = $_GET['id'];
    $result = $wpdb->get_results("SELECT * FROM $Master_table WHERE id='3'");
    // $result2 = $wpdb->get_results("SELECT * FROM $table_name1 WHERE id=3");

    foreach ($result as $print) {
        $name = $print->pack_name;
        $pack_type = $print->pack_type;
        $pack_label = $print->label;
        $pack_cat = $print->category;
    }


    echo "
            <form id='edit-form' method='post'>
                <div class='user-details'>
                    <div class='input-box'>
                        <label for='pack_name' class='details'>Pack Name</label>
                        <input type='text' name='pack_name' value=' $print->pack_name'>
                    </div>
                    <div class='input-box'>
                        <label for='pack_type' class='details'>Pack Type</label>
                        <input type='var' name='pack_type' value='$print->pack_type'>
                    </div>
                    <div class='input-box'>
                        <label for='pack_label' class='details'>Pack Label</label>
                        <input type='text' name='pack_label' value='$print->label'>
                    </div>
                    <div class='input-box'>
                        <label for='pack_cat' class='details'>Pack Category</label>
                        <input type='text' name='pack_cat' value='$print->category'>
                    </div>

                </div>
                <div class='buttons'>
                    <input type='submit' id='update-details' name='update-details' value='Update'>
                </div>
            </form>";
} ?>
<!-- <div class='input-box'>
                        <label for='start_date' class='details'>Start Date</label>
                        <input type='var' name='start_date' value='$print1->start_date'>
                    </div>
                    <div class='input-box'>
                        <label for='start_time' class='details'>Start Time</label>
                        <input type='time' name='start_time' value='$print1->start_time'>
                    </div>
                    <div class='input-box'>
                        <label for='end_time' class='details'>End Time</label>
                        <input type='time' name='end_time' value='$print1->end_time'>
                    </div> -->

<!-- bootstrap panel -->

<div class="container">
    <h3 class="heading"> SAT MATH REVIEW</h3>
    <div class="outer-card">
        <h5 class="card1">Date</h5>
        <div class="card">
            <div class="card-header">
                <div class="card-title">panel title</div>
                <div><input type="submit" class="btn btn-success" value="ENROLL"></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">panel title</div>
                <div><input type="submit" class="btn btn-success" value="ENROLL"></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">panel title</div>
                <div><input type="submit" class="btn btn-success" value="ENROLL"></div>
            </div>
        </div>
    </div>
    <div class="outer-card">
        <h5 class="card1">Date</h5>
        <div class="card">
            <div class="card-header">
                <div class="card-title">panel title</div>
                <div><input type="submit" class="btn btn-success" value="ENROLL"></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">panel title</div>
                <div><input type="submit" class="btn btn-success" value="ENROLL"></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">panel title</div>
                <div><input type="submit" class="btn btn-success" value="ENROLL"></div>
            </div>
        </div>
    </div>
</div>


SELECT wp_free_packages.id,wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time
FROM wp_free_packages
INNER JOIN Customers wp_free_packages.id=wp_free_package_dates.id;

$joined = $wpdb->query("SELECT wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time 
FROM wp_free_packages INNER JOIN wp_free_package_dates ON wp_free_package_dates.pack_id=wp_free_packages.id");

SELECT wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time FROM wp_free_package_dates INNER JOIN wp_free_packages ON wp_free_package_dates.pack_id=wp_free_packages.id;

<?php
global $wpdb;
$table_name = $wpdb->prefix . 'free_package_dates';
$Master_table = $wpdb->prefix . 'free_packages';
$result = $wpdb->get_results("SELECT wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time
FROM $table_name INNER JOIN $Master_table ON wp_free_package_dates.pack_id=wp_free_packages.id GROUP BY $table_name.start_date");


foreach ($result as $print) {
    $tdate = $print->start_date;
    $ress = $wpdb->get_results("SELECT * FROM $table_name WHERE start_date='$tdate'");

    echo $tdate;
    echo "<br><br>";
    foreach ($ress as $prin) {
        echo $prin->start_date . " " . $prin->start_time;
        echo "<br>";
    }
    echo "<br><br>";
} ?>


foreach ($res as $prit) {
    // $tdate = $print->start_date;
    // $ress = $wpdb->get_results("SELECT * FROM $table_name WHERE start_date='$tdate'");
?>
    <?php echo "
<div class='container'>
    <h3 class='heading'>$prit->pack_name($prit->label) </h3>";
    foreach ($result as $print) {
        $tdate = $print->start_date;
        $ress = $wpdb->get_results("SELECT * FROM $table_name WHERE start_date='$tdate'");
    ?>
        <?php echo " <div class='outer-card'>
        
    <h5 class='card1'>$tdate</h5>"; ?>
    <?php foreach ($ress as $prin) {
            echo "  <div class='card'>
            <div class='card-header'>
                <div class='card-title'>$prin->start_time-$prin->end_time</div>
                <div><input type='submit' class='btn btn-success' value='ENROLL'></div>
            </div>
        </div>";
        }
    } ?>
    </div>
    </div>
<?php } ?>



foreach ($result as $print) {
    $tdate = $print->start_date;
    $ress = $wpdb->get_results("SELECT * FROM $table_name WHERE start_date='$tdate'"); ?>
    <?php echo "
<div class='container'>
    <h3 class='heading'>$print->pack_name($print->label) </h3>
    <div class='outer-card'>
    <h5 class='card1'>$tdate</h5>" ?>
    <?php foreach ($ress as $prin) {
        echo " <div class='card'>
            <div class='card-header'>
                <div class='card-title'>$prin->start_time-$prin->end_time</div>
                <div><input type='submit' class='btn btn-success' value='ENROLL'></div>
            </div>
        </div>";
    } ?>
    </div>
    </div>
<?php } ?> -->



<!-- admin panel -->

global $wpdb;
$table_name = $wpdb->prefix . 'free_package_dates';
$Master_table = $wpdb->prefix . 'free_packages';
$result = $wpdb->get_results("SELECT wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time 
FROM $table_name  INNER JOIN $Master_table  ON wp_free_package_dates.pack_id=wp_free_packages.id GROUP BY $table_name.start_date");



// echo "<pre>";
// print_r($result);
// echo "
// <pre>";
// print_r($ress);


foreach ($result as $print) {
    $tdate = $print->start_date;
    $ress = $wpdb->get_results("SELECT * FROM $table_name WHERE start_date='$tdate'"); ?>
    <?php echo "
<div class='container'>
    <h3 class='heading'>$print->pack_name($print->label) </h3>
    <div class='outer-card'>"; ?>
    <?php foreach ($ress as $prin) {
        echo "<h5 class='card1'>$prin->start_date</h5>
        <div class='card'>
            <div class='card-header'>
                <div class='card-title'>$prin->start_time-$prin->end_time</div>
                <div><input type='submit' class='btn btn-success' value='ENROLL'></div>
            </div>
        </div>";
    } ?>
    </div>
    </div>
<?php } ?>

<!-- $result = $wpdb->get_results("SELECT wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time 
FROM $table_name  INNER JOIN $Master_table  ON wp_free_package_dates.pack_id=wp_free_packages.id GROUP BY $table_name.start_date");

$ress = $wpdb->get_results("SELECT * FROM $table_name GROUP BY $table_name.start_date"); -->


<!-- <?php if ($var == '0') {  disabled  } ?> -->

<!-- <?php if ($block == '1') { ?> disabled <?php   } ?>  -->

<!-- <select name="pack_name">
                            <option value="">Select...</option>
                            <option value="<?php $product = wc_get_product(70);echo $product->get_id(); ?>"><?php echo $product->get_title(); ?></option>
                            <option value="<?php $product = wc_get_product(71);echo $product->get_id(); ?>"><?php echo $product->get_title(); ?></option>
                            <option value="<?php $product = wc_get_product(72);echo $product->get_id(); ?>"><?php echo $product->get_title(); ?></option>
                            <option value="<?php $product = wc_get_product(73);echo $product->get_id(); ?>"><?php echo $product->get_title(); ?></option>
                            <option value="<?php $product = wc_get_product(74);echo $product->get_id(); ?>"><?php echo $product->get_title(); ?></option>
                        </select> -->


                        <!-- // server side script from youtube example -->
<?php
// include connection file 
include_once("connection.php");

// initilize all variable
$params = $columns = $totalRecords = $data = array();

$params = $_REQUEST;

//define index of column
$columns = array(
    0 => 'id',
    1 => 'employee_name',
    2 => 'employee_salary',
    3 => 'employee_age'
);

$where = $sqlTot = $sqlRec = "";

// check search value exist
if (!empty($params['search']['value'])) {
    $where .= " WHERE ";
    $where .= " ( employee_name LIKE '" . $params['search']['value'] . "%' ";
    $where .= " OR employee_salary LIKE '" . $params['search']['value'] . "%' ";

    $where .= " OR employee_age LIKE '" . $params['search']['value'] . "%' )";
}

// getting total number records without any search
$sql = "SELECT * FROM `employee` ";
$sqlTot .= $sql;
$sqlRec .= $sql;
//concatenate search sql if value exist
if (isset($where) && $where != '') {

    $sqlTot .= $where;
    $sqlRec .= $where;
}


$sqlRec .=  " ORDER BY " . $columns[$params['order'][0]['column']] . "   " . $params['order'][0]['dir'] . "  LIMIT " . $params['start'] . " ," . $params['length'] . " ";

$queryTot = mysqli_query($conn, $sqlTot) or die("database error:" . mysqli_error($conn));


$totalRecords = mysqli_num_rows($queryTot);

$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

//iterate on results row and create new index array of data
while ($row = mysqli_fetch_row($queryRecords)) {
    $data[] = $row;
}

$json_data = array(
    "draw"            => intval($params['draw']),
    "recordsTotal"    => intval($totalRecords),
    "recordsFiltered" => intval($totalRecords),
    "data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format
