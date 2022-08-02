<div class="container">
    <table id="dataTable" class="display" width="100%">
        <thead>
            <tr role="row">
                <th>ID</th>
                <th>Pack Name</th>
                <th>Pack Label</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Pack Name</th>
                <th>Pack Label</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>

            </tr>
        </tfoot>
    </table>
</div>
<script>
    function delete_data(att, id) {

        jQuery.ajax({
            type: 'POST',
            url: datatablesajax.url + '?action=delete_data&id=' + id,
            success: function(res) {
                console.log(res);
                window.location.reload()
            }
        });

    }

    jQuery(document).ready(function($) {
        jQuery('#dataTable').DataTable({
            // "processing": true,
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
            },
            columns: [{
                    data: 'user_id'
                },
                {
                    data: 'pack_name'
                },
                {
                    data: 'label'
                },
                {
                    data: 'start_date'
                },
                {
                    data: 'start_time'
                },
                {
                    data: 'end_time'
                },
                {
                    data: 'action'
                },
            ],

        });

    });
</script>