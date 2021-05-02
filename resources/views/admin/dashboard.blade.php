<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv="Content-Language" content="en">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title> {{ config('app.name') }} </title>
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
     />
     <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <!-- Disable tap highlight on IE -->
     <meta name="msapplication-tap-highlight" content="no">
     <link rel="stylesheet"  href="{{ asset('dashboard/font/flaticon.css') }}">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('dashboard/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
     <link href="{{ asset('dashboard/style.css') }}" rel="stylesheet">
     <link href="{{ asset('dashboard/customstyle.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">



     <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.js" defer></script> 
    <script src="/dist/vuejs-datatable.js" defer></script> 
    <script src="/myscript.js" defer></script> 



     <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */
        } 
    </style>
  
</head>
<body>


 <div id="app">
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar closed-sidebar">
        @include('admin.header')
        <div class="app-main">
          @include('admin.sidebar')
                <div class="app-main__outer  col-12 pr-0">
                  <div class="app-main__inner pb-3">
                        <admin-content></admin-content>
                  </div>
                  @include('admin.footer')
               </div>
         </div>
      </div>
  </div>

@include('admin.headerbar')

 <script src="{{ asset('js/app.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('dashboard/assets/scripts/main.js') }}"></script>
 <script type="text/javascript" src="{{ asset('dashboard/assets/scripts/icon-change.js') }}"></script>
 <script type="text/javascript" src="{{ asset('dashboard/assets/scripts/print.js') }}"></script>
<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
<script type="text/javascript">




 


// function printData()
// {
//    var divToPrint = document.getElementById("invoice");
//    newWin = window.open('<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">');
//    newWin.document.write(divToPrint.outerHTML);
//    newWin.print();
//    newWin.close();
// }
//  $('#printInvoice').click(function(){
//             printData();
//         });
 





$('.app-main').click(function (e) {

var container = $(".closed-sidebar");
container.removeClass('sidebar-mobile-open');

 
var container = $(".mobile-toggle-nav");
container.removeClass('is-active');


$(".fixed-sidebar").addClass('closed-sidebar');

 
});

function toggleIcon(e) {
    $(e.target)
        .prev('.metismenu')
        .find(".icon0")
        .toggleClass('flaticon-add flaticon-adds');
}
$('.app-sidebar__inner').on('hidden.bs.collapse', toggleIcon);
$('.app-sidebar__inner').on('shown.bs.collapse', toggleIcon);


</script>
</body>
</html>
