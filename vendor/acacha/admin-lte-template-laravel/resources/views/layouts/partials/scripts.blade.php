<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- DataPicker -->
<script src="{{ url ('/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<!-- DataTables -->
<script src="{{ url ('/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ url ('/plugins/dataTables.bootstrap.min.js') }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    
    $(function () {
        "use strict";
        
        //The Calender
        $("#calendar").datepicker();
        
        //The Tables
        $("#example1").DataTable();
    });
</script>
