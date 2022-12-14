<?php
global $wpdb;
$order_details = $wpdb->prefix . 'order_details';
// include connection file 
// include_once("connection.php");

// initilize all variable
$params = $columns = $totalRecords = $data = array();

$params = $_REQUEST;

//define index of column
$columns = array(
    0 => 'Order_id',
    1 => 'Order_total',
    2 => 'Order_item_name',
    3 => 'Order_quantity',
    4 => 'Billing_country',
    5 => 'Billing_state',
    6 => 'Billing_city',
    7 => 'Billing_phone'
);



$where = $sqlTot = $sqlRec = "";

// check search value exist
if (!empty($params['search']['value'])) {
    $where .= " WHERE ";
    $where .= " ( Order_id LIKE '" . $params['search']['value'] . "%' ";
    $where .= " OR Order_total LIKE '" . $params['search']['value'] . "%' ";
    $where .= " OR Order_item_name LIKE '" . $params['search']['value'] . "%' )";
    $where .= " OR Order_quantity LIKE '" . $params['search']['value'] . "%' )";
    $where .= " OR Billing_country LIKE '" . $params['search']['value'] . "%' )";
    $where .= " OR Billing_state LIKE '" . $params['search']['value'] . "%' )";
    $where .= " OR Billing_city LIKE '" . $params['search']['value'] . "%' )";
    $where .= " OR Billing_phone LIKE '" . $params['search']['value'] . "%' )";



}

// getting total number records without any search
$sql = "SELECT * FROM $order_details ";
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
