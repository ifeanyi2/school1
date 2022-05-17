<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

     <title>{{ config('app.name')}} :: @yield('title')</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    
   

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

       @include('admin.layouts.body.header')

       @include('admin.layouts.body.sidebar')

       @yield('admin')

       @include('admin.layouts.body.footer')


    </div>
    <!-- ./wrapper -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

    <!-- Sunny Admin App -->
    <script src="{{ asset('backend/js/template.js') }}"></script>
    <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
          var type = "{{ Session::get('alert-type', 'info') }}"
          switch (type) {
              case 'info':
                  toastr.info(" {{ Session::get('message') }}");
                  break;
              case 'info':
                  toastr.info(" {{ Session::get('message') }}");
                  break;
              case 'success':
                  toastr.success(" {{ Session::get('message') }}");
                  break;
              case 'warning':
                  toastr.warning(" {{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error(" {{ Session::get('message') }}");
                  break;
          
             
          }
            
        @endif
    </script>






 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e){
                e.preventDefault();
                var link = $(this).attr('href');

                Swal.fire({

                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'

                }).then((result) => {

                    if (result.isConfirmed) {

                        window.location.href = link;

                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }

                });
            })
            
        })
    </script>
    @yield('scripts')


</body>

</html>
