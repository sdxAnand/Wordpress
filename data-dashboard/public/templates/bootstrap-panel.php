<?php
global $wpdb;
global $woocommerce;
global $product;
$Details_table = $wpdb->prefix . 'free_package_dates';
$Master_table = $wpdb->prefix . 'free_packages';
$result = $wpdb->get_results("SELECT wp_free_packages.id, wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time 
FROM $Details_table  INNER JOIN $Master_table  ON wp_free_package_dates.pack_id=wp_free_packages.id GROUP BY $Details_table.start_date");

$res = $wpdb->get_results("SELECT * FROM $Master_table GROUP BY $Master_table.pack_name ");

foreach ($res as $data) { ?>
    <div class='containerpub'>
        <h3 class='heading'> <?php echo "$data->pack_name($data->label)"; ?> </h3>
        <?php foreach ($result as $print) {
            $tdate = $print->start_date;
            $ress = $wpdb->get_results("SELECT * FROM $Details_table WHERE start_date='$tdate'"); ?>
            <div class='outer-card'>
                <h5 class='card1'> <?php echo $tdate ?></h5>
                <?php foreach ($ress as $prin) {
                    $block = $prin->block;
                    $hide = $prin->hide;
                    // if ($hide == '0') { 
                ?>
                    <div class='card'>
                        <div class='card-header'>
                            <div class='card-title'><?php echo "$prin->start_time - $prin->end_time"; ?></div>
                            <!-- <div><input type='submit' class='btn btn-success' onclick="enroll_function(this, <?php echo $data->product_id; ?> )" value=' ENROLL' <?php if ($block == '1') { ?> disabled <?php   } ?>> </div> -->
                            <?php echo "<div> <button class='btn btn-success'  onclick='enroll_function(this, " . $data->product_id . ")'>ENROLL</button></div>"; ?>
                        </div>
                    </div>
                    <!-- ?php } ? -->
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<script>
    function enroll_function(att, product_id) {

        jQuery.ajax({
            type: 'POST',
            url: datatablesajax.url + '?action=enroll_now&product_id=' + product_id,
            success: function(res) {
                console.log(res);
            }
        });

    }
</script>
<!-- &id=' + id, -->
<!-- $product_id = 123;
WC()->cart->add_to_cart( $product_id ); -->