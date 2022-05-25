@include("layouts.header")

<body>
    <script> 
    //== Prevent DataTables from showing error alert message  ==========////// 
     $(function(){ $.fn.DataTable.ext.errMode = 'throw'; } ); 
     </script>
    <!-- Preloader --> <div id="preloader"> <div class="page_loader"></div></div> <!-- /Preloader -->
<section class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
<button type="button" data-dismiss="modal" class="hide close_modals__"></button>
@include("layouts.nav")
@include('partials.alert_modals')
@include("layouts.sidebar")
<section style="width:100%">
@yield("content")
</section>
@include("layouts.footer")
</section>
</body>
</html>