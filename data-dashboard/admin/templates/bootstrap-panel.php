<style>
    .container {
        border: 2px solid;
        padding: 0;
        margin-bottom: 3px;
    }

    .heading {
        background: #40407b;
        color: white;
        text-align: center;
    }

    .outer-card {
        display: flex;
        flex-wrap: wrap;
    }

    .card1 {
        width: 100%;
        text-align: center;
    }

    .card {
        width: 33%;
        border: 2px solid;
        margin: 0px 1px 1.3rem 1px;
        align-items: center;
    }

    .card-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .btn {
        border-radius: 20px;
        font-weight: 500;
    }
</style>
<?php
global $wpdb;
global $woocommerce;
global $product;
$table_name = $wpdb->prefix . 'free_package_dates';
$Master_table = $wpdb->prefix . 'free_packages';
$result = $wpdb->get_results("SELECT wp_free_packages.id, wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time 
FROM $table_name  INNER JOIN $Master_table  ON wp_free_package_dates.pack_id=wp_free_packages.id GROUP BY $table_name.start_date");

$res = $wpdb->get_results("SELECT * FROM $Master_table GROUP BY $Master_table.pack_name ");

foreach ($res as $data) { ?>
    <div class='container'>
        <h3 class='heading'> <?php echo "$data->pack_name($data->label)"; ?> </h3>
        <?php foreach ($result as $print) {
            $tdate = $print->start_date;
            $ress = $wpdb->get_results("SELECT * FROM $table_name WHERE start_date='$tdate'"); ?>
            <div class='outer-card'>
                <h5 class='card1'> <?php echo $tdate ?></h5>
                <?php foreach ($ress as $prin) {
                    $block = $prin->block;
                    $hide = $prin->hide;
                    if ($hide == '0') { ?>
                        <div class='card'>
                            <div class='card-header'>
                                <div id='timestamp' class='card-title'><?php echo "$prin->start_time-$prin->end_time"; ?></div>
                                <div><input type='submit' class='btn btn-success name=' enroll' value='ENROLL' <?php if ($block == '1') { ?> disabled <?php   } ?>> </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<!-- 
add_action('woocommerce_add_to_cart', 'custome_add_to_cart');

    function custome_add_to_cart() {
        if (isset($_POST['option1'])) {
            $product_id = 2218;

            // Prevent the add_to_cart action from looping
            remove_action('woocommerce_add_to_cart', __FUNCTION__);

            WC()->cart->add_to_cart( $product_id );
        }
    } -->



<!-- 
<script>
    $(document).ready(function() {
        $('button[type="submit"]').prop('disabled', false);
        $('input[type="text"]').keyup(function() {
            if ($(this).val() != '') {
                $(':input[type="submit"]').prop('disabled', false);
            }
        });
    });

</script> -->
<!-- $
    if (hide=1){
        $(#timestamp).hide();
    }

    if ($("#seats").val() != '') {
    setflag = false;
    alert("Not a valid character")
} -->
<!-- if(isset($_POST['block']=='1')?disable:enable;) -->

<!-- <button type='submit' id='enroll-btn' class='btn btn-success dissable'> ENROLL</button> -->