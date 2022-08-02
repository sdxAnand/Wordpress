<style>
    /* * {
        margin: 0;
        padding: 0;
    }

    .card-container {
        margin-top: 5px;
        /* border: 2px solid; /
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .card-container .card .heading {
        /* border: 3px solid #d4dfe3; /
        text-align: center;
        width: 100%;
        font-size: 25px;
        font-weight: 500;
        background: #292952;
        color: #fff;
        border-radius: 5px;
    }

    .card-container .card .card-header .card-title {
        background: #243a5e;
        width: 100%;
        color: white;
        text-align: center;
        font-size: 20px;
        border-radius: 10px;
        font-weight: 500;
    }

    .card-container .card .card-header .card-title .card-body {
        /* border: 2px solid; /
        display: flex;
        flex-direction: column;
        justify-items: center;
        width: 100%;
        top: 2%;
        bottom: 2%;
    }

    .card-container .card .card-header {
        display: flex;
        flex-direction: column;
        margin: 5px 25px;
    }

    .card-container .card {
        /* border: 2px solid; */
    /* background: yellow; /
        width: 33%;
        height: 100%;
        padding: 0px;
        margin-bottom: 20px
    }

    .card-container .card .price {
        text-align: center;
        margin: 1rem 0 0.1rem 0;
        width: 100%;
    }

    .card-container .card .price .price1 {
        color: red;
        font-size: larger;
        font-weight: bolder;
    }

    .card-container .card .price .price2 {
        color: green;
        font-size: larger;
        font-weight: bolder;
    }

    .buttondiv {
        margin-top: 12px;
        display: flex;
        justify-content: space-between;
    } */

    /* .btn {
        width: 45%;
        text-align: center;
        font-weight: 600;
        font-size: 20px;
        border-radius: 45px;
    } */

    /* .date {
        text-align: center;

    } */


    /* popup css */
    /* .popup .overlay {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
        display: none;
    }

    .popup .content {
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 5px;
        transform: translate(-50%, -50%) scale(0);
        background: #fff;
        width: 95%;
        max-width: 500px;
        height: fit-content;
        z-index: 2;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
        font-family: "Open Sans", sans-serif;
    }

    .popup .close-btn {
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 10px;
        width: 30px;
        height: 30px;
        background: #222; //
        color: #222;
        font-size: 25px;
        font-weight: 600;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
    }

    .popup .content .btn {
        margin-bottom: 0px; //
        border-radius: 15px;
        width: 20%;
    }

    .popup.active .overlay {
        display: block;
    }

    .popup.active .content {
        transition: all 300ms ease-in-out;
        transform: translate(-50%, -50%) scale(1.5);
    } */
</style>
<?php
global $wpdb;
global $woocommerce;
global $product;
$Details_table = $wpdb->prefix . 'free_package_dates';
$Master_table = $wpdb->prefix . 'free_packages';
$result = $wpdb->get_results("SELECT wp_free_packages.id, wp_free_packages.pack_name, wp_free_packages.pack_desc, wp_free_packages.label, wp_free_packages.product_id, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time 
FROM $Details_table  INNER JOIN $Master_table  ON wp_free_package_dates.pack_id=wp_free_packages.id  ");

?>
<div class="card-container">
    <?php foreach ($result as $data) {
        $product = wc_get_product($data->product_id); ?>
        <div class='card'>
            <div class="heading"> <?php echo $product->get_title(); ?></div>
            <div class="price"><span class="price1"><s>$<?php echo $product->get_regular_price(); ?></s></span> <span class="price2">$<?php echo $product->get_sale_price(); ?></span></div>
            <div class='card-header'>
                <div class='card-title'>SESSION SCHEDULE</div>
                <div class='card-body'>
                    <div class="date"><?php echo $data->start_date; ?></div>
                    <div class="date"><?php echo $data->start_time . ' PM ' . '- ' . $data->end_time . ' PM'; ?></div>
                    <div class="buttondiv">
                        <button class='btn btn-success btn-sm'  onclick='enroll_function(this, <?php echo $data->product_id ?>)'>ENROLL</button>
                        <button class='btn btn-success btn-sm' id="hell" value="<?php echo $product->get_description($data->product_id); ?>" onclick="togglePopup(this)">KNOW MORE</button>
                    </div>
                </div>
            </div>
        </div>
    <?php  } ?>
</div>

<div class="popup" id="popup-1">
    <div class="overlay">
        <div class="content">
            <div class="close-btn" onclick="togglePopup()">×</div>
            <h1>Title</h1>
            <p id="desc"></p>
            <button class='btn btn-success btn-sm' onclick="togglePopup()">CLOSE</button>
        </div>
    </div>
</div>

<script>
    function togglePopup(id) {
        document.getElementById("popup-1").classList.toggle("active");
        document.getElementById("desc").innerHTML = id.value;
    }

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