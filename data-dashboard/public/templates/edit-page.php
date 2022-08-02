<?php
global $wpdb;
$Details_table = $wpdb->prefix . 'free_package_dates';
$Master_table = $wpdb->prefix . 'free_packages';


if (isset($_POST['update'])) {
    $id = $_POST['uptid'];
    $pack_name = $_POST['pack_name'];
    $pack_type = $_POST['pack_type'];
    $pack_label = $_POST['pack_label'];
    $pack_cat = $_POST['pack_cat'];
    $hide = isset($_POST['Hide']) ? 1 : 0;
    $block = isset($_POST['Block']) ? 1 : 0;
    $wpdb->query($wpdb->prepare("UPDATE `$Master_table` SET pack_name = '$pack_name' , label = '$pack_label', category = '$pack_cat' WHERE id = '$id'"));
    $wpdb->query("INSERT INTO $Details_table(hide, block) VALUES('$hide','$block')");
    echo "<script>location.href = 'admin.php?page=data_table';</script>";
}

if (isset($_GET['edit'])) {
    $upt_id = $_GET['edit'];
    $result = $wpdb->get_results("SELECT * FROM $Master_table WHERE id='$upt_id'");
    foreach ($result as $print) {
    } ?>
    <div class='con'>
        <div class='contained'>
            <div class='title'>Registration</div>
            <div class='content'>
                <form id='edit-form' method='post'>
                    <div class='user-details'>
                        <div class='input-box'>
                            <input type='text' id='uptid' name='uptid' value=' <?php echo " $print->id"; ?>'>
                            <label for='pack_name' class='details'>Pack Name</label>
                            <input type='text' id='pack_name' name='pack_name' value=' <?php echo "$print->pack_name"; ?>'>
                        </div>
                        <div class='input-box'>
                            <label for='pack_type' class='details'>Pack Type</label>
                            <input type='var' id='pack_type' name='pack_type' value=' <?php echo "$print->pack_type"; ?>'>
                        </div>
                        <div class='input-box'>
                            <label for='pack_label' class='details'>Pack Label</label>
                            <input type='text' id='pack_label' name='pack_label' value=' <?php echo "$print->label"; ?>'>
                        </div>
                        <div class='input-box'>
                            <label for='pack_cat' class='details'>Pack Category</label>
                            <input type='text' id='pack_cat' name='pack_cat' value='<?php echo " $print->category"; ?>'>
                        </div>
                    </div>
                    <div class='input-box'>
                        <input type='checkbox' name='Hide' value='1'> HIDE &nbsp &nbsp
                        <input type='checkbox' name='Block' value='1'> BLOCK
                    </div>

                    <div class='buttons'>
                        <input type='submit' id='update' name='update' value='Update'>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- // }
//Check if checkbox is checked
// if(!empty($_POST['checkbox'])){
#Checkbox selected code
// } else {
#Checkbox not selected code
// } -->
<!-- 
// <div class='input-box'>
    // <input type='checkbox' name='box[]' value='Hide'> HIDE &nbsp &nbsp
    // <input type='checkbox' name='box[]' value='Hide'> BLOCK
    // </div>


// <div class='input-box'>
    // <label for='start_date' class='details'>Start Date</label>
    // <input type='date' name='start_date' value='$print->start_date'>
    // </div>
// <div class='input-box'>
    // <label for='start_time' class='details'>Start Time</label>
    // <input type='time' name='start_time' value='$print->start_time'>
    // </div>
// <div class='input-box'>
    // <label for='end_time' class='details'>End Time</label>
    // <input type='time' name='end_time' value='$print->end_time'>
    // </div>


// $result = $wpdb->get_results("SELECT wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time
// FROM $Details_table INNER JOIN $Master_table ON wp_free_package_dates.pack_id=wp_free_packages.id WHERE id='6'");
// $result = $wpdb->get_results("SELECT * FROM $Master_table");
// $result2 = $wpdb->get_results("SELECT * FROM $Details_table1 WHERE id=3");


// $wpdb->query("UPDATE $Details_table SET start_date='$start_date', start_time='$start_time',end_time='$end_time', WHERE id='$id'");
// UPDATE `wp_free_packages` SET `category` = 'Trial Course', `label` = '30 Min', `pack_name` = 'SAT ENGLISH REVIEW - Tria' WHERE `wp_free_packages`.`id` = 10; -->