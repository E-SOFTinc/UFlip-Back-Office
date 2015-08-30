var TableData = function () {
    //function to initiate DataTable
    //DataTable is a highly flexible tool, based upon the foundations of progressive enhancement, 
    //which will add advanced interaction controls to any HTML table
    //For more information, please visit https://datatables.net/
    var runDataTable = function () {
        var msg2=$("#row_msg").html();
        var msg1=$("#show_msg").html();
        var msg3=$('#nofond').html();
        var msg4=$('#showing').html();
        var msg5=$('#to').html();
        var msg6=$('#of').html();
        var msg7=$('#entries').html();
        var msg8=$('#notavailable').html();
        var oTable = $('#sample_1').dataTable({
            "aoColumnDefs": [{
                "aTargets": [0]
            }],
            "oLanguage": {
                "sLengthMenu": msg1+" _MENU_ "+msg2,
                "sInfo": msg4+" _START_ "+msg5+" _END_ "+msg6+" _TOTAL_ "+msg7,
                "sSearch": "",
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                },
            "sZeroRecords": msg3,            
            "sInfoEmpty": msg8
            },
            "aaSorting": [
                [0, 'asc']
            ],
            "aLengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 10,
        });
        $('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        // modify table search input
        $('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
        // modify table per page dropdown
        $('#sample_1_wrapper .dataTables_length select').select2();
        // initialzie select2 dropdown
        $('#sample_1_column_toggler input[type="checkbox"]').change(function () {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
    };
    return {
        //main function to initiate template pages
        init: function () {
            runDataTable();
        }
    };
}();