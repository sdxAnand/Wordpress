<?php
global $wpdb;
global $product;
$table_name = $wpdb->prefix . 'free_package_dates';
$Master_table = $wpdb->prefix . 'free_packages';
if (isset($_POST['register'])) {
    $result = $_POST['pack_name'];
    $result_explode = explode('|', $result);
    $product_id= $result_explode[0];
    $pack_name=$result_explode[1];
    $pack_type = $_POST['pack_type'];
    $pack_label = $_POST['pack_label'];
    $pack_cat = $_POST['pack_cat'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $wpdb->query("INSERT INTO $Master_table( pack_name, label, pack_type, category, product_id) VALUES('$pack_name','$pack_label','$pack_type', '$pack_cat', '$product_id')");
    $wpdb->query("SET @last_id=LAST_INSERT_ID()");
    $wpdb->query("INSERT INTO $table_name( pack_id, start_date, start_time, end_time) VALUES(@last_id,'$start_date', '$start_time', '$end_time')");
    // echo "<script>location.href = 'admin.php?page=dashboard-menu';</script>";
    echo $product_id;
    echo $pack_name;
}
?>
<br>
<?php
// $id = 68;
// $product = wc_get_product($id);
// echo $product->get_title() . "<br>";
// echo $product->get_id();
// echo "<pre>";
// print_r($product);
// echo "</pre>";
echo "hello this is to get product_ID";
?>

<!-- ?php
            $result = $_POST['car'];
            $result_explode = explode('|', $result);
            echo "Model: ". $result_explode[0]."<br />";
            echo "Colour: ". $result_explode[1]."<br />";
    ? -->



<div class="con">
    <div class="contained">
        <div class="title">Registration</div>
        <div class="content">
            <form id="add-form" method="post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                <div class="user-details">
                    <div class="input-box">
                        <label for="pack_name" class="details">Pack Name</label>
                        <!-- <input type="text" name="pack_name" placeholder="Pack Name"> -->
                        <select name="pack_name">
                            <option value="">Select...</option>
                            <option value="<?php $product = wc_get_product(70); echo $product->get_id()."|".$product->get_title(); ?>"><?php echo $product->get_title(); ?></option>
                            <option value="<?php $product = wc_get_product(71); echo $product->get_id()."|".$product->get_title(); ?>"><?php echo $product->get_title(); ?></option>
                            <option value="<?php $product = wc_get_product(72); echo $product->get_id()."|".$product->get_title(); ?>"><?php echo $product->get_title(); ?></option>
                            <option value="<?php $product = wc_get_product(73); echo $product->get_id()."|".$product->get_title(); ?>"><?php echo $product->get_title(); ?></option>
                            <option value="<?php $product = wc_get_product(74); echo $product->get_id()."|".$product->get_title(); ?>"><?php echo $product->get_title(); ?></option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="pack_type" class="details">Pack Type</label>
                        <input type="number" name="pack_type" placeholder="Pack Type">
                    </div>
                    <div class="input-box">
                        <label for="pack_label" class="details">Pack Label</label>
                        <input type="text" name="pack_label" placeholder="Pack Label">
                    </div>
                    <div class="input-box">
                        <label for="pack_cat" class="details">Pack Category</label>
                        <input type="text" name="pack_cat" placeholder="Pack Category">
                    </div>
                    <div class="input-box">
                        <label for="start_date" class="details">Start Date</label>
                        <input type="date" name="start_date" placeholder="Start Date">
                    </div>
                    <div class="input-box">
                        <label for="start_time" class="details">Start Time</label>
                        <input type="time" name="start_time" placeholder="Start Time">
                    </div>
                    <div class="input-box">
                        <label for="end_time" class="details">End Time</label>
                        <input type="time" name="end_time" placeholder="End Time">
                    </div>
                </div>
                <div class="buttons">
                    <input type="submit" name="register" value="Add data">
                    <!-- <input type="button" id="edit" name="edit" value="Edit data"> -->
                    <!-- <input id="edit-btn" name="edit" type='button' value="EDIT"> -->
                </div>
            </form>
        </div>
    </div>
</div>
<?php
