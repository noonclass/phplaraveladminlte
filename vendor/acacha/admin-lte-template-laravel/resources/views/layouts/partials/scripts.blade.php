<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- DataPicker -->
<script src="{{ url ('/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ url ('/plugins/bootstrap-datepicker.zh-CN.js') }}" type="text/javascript"></script>
<!-- DataTables -->
<script src="{{ url ('/plugins/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/plugins/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<!-- Datatables/extensions/buttons -->
<script src="{{ url ('/plugins/dataTables.buttons.min.js') }}" type="text/javascript" ></script>
<script src="{{ url ('/plugins/buttons.bootstrap.min.js') }}" type="text/javascript" ></script>
<script src="{{ url ('/plugins/buttons.colVis.min.js') }}" type="text/javascript" ></script>
<!-- Application Wizard -->
<script src="{{ url ('/plugins/bootstrap-wizard.min.js') }}" type="text/javascript"></script>
<!-- Select2 -->
<script src="{{ url ('/plugins/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/plugins/select2.zh-CN.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script type="text/javascript">
    $(document).ready(function() {
        "use strict";
        
        //The Calender
        $("#calendar").datepicker();
        
        //The Tables
        var table = $("#datatable").DataTable({
            lengthChange: false,
            buttons: ['pageLength', 'colvis'],
            language: {"url": "{{ url ('/plugins/jquery.dataTables.zh-CN.json') }}"},
            initComplete: function(settings, json) {
                table.buttons().container().appendTo( '#datatable_wrapper .col-sm-6:eq(0)' );
            }
        });
        //table.buttons().container().appendTo( '#datatable_wrapper .col-sm-6:eq(0)' );
    });
</script>
