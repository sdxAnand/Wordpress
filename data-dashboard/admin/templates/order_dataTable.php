<div class="container">
    <table id="dataTable" class="display" style="width:100%">
        <thead>
            <tr role="row">
                <th>Order ID</th>
                <th>Order Total</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Billing Country</th>
                <th>Billing State</th>
                <th>Billing City</th>
                <th>Billing Phone</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr role="row">
                <th>Order ID</th>
                <th>Order Total</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Billing Country</th>
                <th>Billing State</th>
                <th>Billing City</th>
                <th>Billing Phone</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    jQuery(document).ready(function($) {
        jQuery('#dataTable').DataTable({
            // "iDisplayLength": 10,
            // "columnDefs": [{
            //         orderable: false,
            //         targets: 0
            //     },
            //     {
            //         orderable: false,
            //         targets: 8
            //     }
            // ],
            "processing": true,
            "serverSide": true,
            "destroy": true,
            dom: 'lBfrtip',
            buttons: [{
                    "extend": 'csv',
                    "text": 'CSV',
                    "titleAttr": 'CSV',
                    "title": 'Order-Details',
                },
                {
                    "extend": 'excel',
                    "text": 'Excel',
                    "titleAttr": 'Excel',
                    "title": 'Order-Details',
                },
                {
                    "extend": 'pdf',
                    "text": 'PDF',
                    "titleAttr": 'PDF',
                    "title": 'Order-Details',
                },
            ],
            "lengthMenu": [10, 25, 50, 100],
            ajax: {
                url: datatablesajax.url + '?action=show_orders',
                type: "POST",
                // "draw": 1,
                // "recordsTotal": 57,
                // "recordsFiltered": 57,
                // success: function(result) {
                //     console.log(result);
                // }
            },
            columns: [{
                    data: 'order_id'
                },
                {
                    data: 'total_bill'
                },
                {
                    data: 'product_name'
                },
                {
                    data: 'quantity'
                },
                {
                    data: 'country'
                },
                {
                    data: 'state'
                },
                {
                    data: 'city'
                },
                {
                    data: 'phone'
                },
            ],

        });

    });
</script>
<!-- // "processing": true,
            // "serverSide": true,
            dom: 'lBfrtip',
            buttons: ['excel', 'csv', 'pdf'],
            "lengthMenu": [10, 25, 50, 100],
            ajax: {
                url: datatablesajax.url + '?action=show_data',
                type: "POST"
                // success: function(result) {
                //     console.log(result);
                // }
            }, -->
<!-- "bProcessing": true,
         "serverSide": true,
         "ajax":{
            url :"response.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#employee_grid_processing").css("display","none");
            }
          } -->