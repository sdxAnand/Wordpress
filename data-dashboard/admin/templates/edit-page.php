<?php
global $wpdb;
$table_name = $wpdb->prefix . 'free_package_dates';
$Master_table = $wpdb->prefix . 'free_packages';


if (isset($_POST['update'])) {
    $id = $_POST['uptid'];
    $pack_name = $_POST['pack_name'];
    $pack_type = $_POST['pack_type'];
    $pack_label = $_POST['pack_label'];
    $pack_cat = $_POST['pack_cat'];
   echo $hide = isset($_POST['hide']) ? 1 : 0;
    echo $block = isset($_POST['block']) ? 1 : 0;
    // $block = $_POST['Block-box'];
    // $wpdb->query($wpdb->prepare("UPDATE `$Master_table` SET pack_name = '$pack_name' , label = '$pack_label', category = '$pack_cat' WHERE id = '$id'"));
    // $wpdb->query("INSERT INTO $table_name( hide) VALUES('1') WHERE id = '$id'");
    // if (!empty($_POST['Hide-box'])) {
    // } else {
    //     $wpdb->query("INSERT INTO $table_name( hide) VALUES('0') WHERE id = '$id'");
    // }

    // if (!empty($_POST['Block-box'])) {
    //     $wpdb->query("INSERT INTO $table_name( hide) VALUES('1') WHERE id = '$id'");
    // } else {
    //     $wpdb->query("INSERT INTO $table_name( hide) VALUES('0') WHERE id = '$id'");
    // }
    // echo "<script>location.href = 'admin.php?page=dashboard-menu';</script>";
}
?>


<?php if (isset($_GET['edit'])) {
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
                            <input type='hidden' id='uptid' name='uptid' value='<?php echo " $print->id "; ?>'>
                            <label for='pack_name' class='details'>Pack Name</label>
                            <input type='text' id='pack_name' name='pack_name' value='<?php echo " $print->pack_name "; ?>'>
                        </div>
                        <div class='input-box'>
                            <label for='pack_type' class='details'>Pack Type</label>
                            <input type='var' id='pack_type' name='pack_type' value='<?php echo "$print->pack_type "; ?>'>
                        </div>
                        <div class='input-box'>
                            <label for='pack_label' class='details'>Pack Label</label>
                            <input type='text' id='pack_label' name='pack_label' value='<?php echo " $print->label "; ?>'>
                        </div>
                        <div class='input-box'>
                            <label for='pack_cat' class='details'>Pack Category</label>
                            <input type='text' id='pack_cat' name='pack_cat' value='<?php echo "$print->category "; ?>'>
                        </div>
                    </div>
                    <div class='input-box'>
                        <input type="checkbox" name="hide" value="1"/>
                        <label for='check' class='details'>HIDE</label>
                        <input type="checkbox" name="block" value="1"/>
                        <label for='check' class='details'>BLOCK</label>
                    </div>

                    <div class='buttons'>
                        <input type='submit' id='update' name='update' value='Update'>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- $check_0 = isset($_POST['check'][0]) ? 1 : 0;
$check_1 = isset($_POST['check'][1]) ? 1 : 0; -->
<!-- <input type="checkbox" name="check[0]" value="1" />
<input type="checkbox" name="check[1]" value="1" /> -->
<!-- <
$a = 10;
$b = $a > 15 ? 20 : 5;
print("Value of b is " . $b);
?>
if checked then 1:0; -->
<!-- <php if ($block == '1') { ?> disabled <php   }  -->

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
    // <input type='time' name='end_time' value='$print->end_time'> -->
<!-- // </div>

-->


<!-- // $result = $wpdb->get_results("SELECT wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time
// FROM $table_name INNER JOIN $Master_table ON wp_free_package_dates.pack_id=wp_free_packages.id WHERE id='6'");
// $result = $wpdb->get_results("SELECT * FROM $Master_table");
// $result2 = $wpdb->get_results("SELECT * FROM $table_name1 WHERE id=3");


// $wpdb->query("UPDATE $table_name SET start_date='$start_date', start_time='$start_time',end_time='$end_time', WHERE id='$id'");
// UPDATE `wp_free_packages` SET `category` = 'Trial Course', `label` = '30 Min', `pack_name` = 'SAT ENGLISH REVIEW - Tria' WHERE `wp_free_packages`.`id` = 10; -->