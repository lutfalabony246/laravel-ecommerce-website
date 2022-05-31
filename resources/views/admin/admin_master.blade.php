<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $seo = App\Models\Seo::first();
    @endphp
    <meta charset="utf-8" />
    <title>{{ optional($seo)->meta_title }}</title>
    <meta name="title" content={{  optional($seo)->meta_title }}>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content={{ optional($seo)->meta_description }} name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content={{ optional($seo)->meta_author }}>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../admin/images/favicon.ico">
    <!-- Plugins css -->
    <link href="{{ asset('backend/assets') }}/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"type="text/css" />
    <!-- App css -->
    <link href="{{ asset('backend/assets') }}/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('backend/assets') }}/css/config/default/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />
    <link href="{{ asset('backend/assets') }}/css/config/default/bootstrap-dark.min.css" rel="stylesheet"
        type="text/css" id="bs-dark-stylesheet" />
    <link href="{{ asset('backend/assets') }}/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />
    <link href="{{ asset('backend/assets') }}/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{ asset('backend/assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/css/dashboard.css" rel="stylesheet">
    {{--  <link href="{{ asset('backend/assets') }}/css/select2.min.css" rel="stylesheet" type="text/css" />  --}}
    {{-- for toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .avatar-title {
            align-items: center;
            color: #fff;
            display: flex;
            height: 100%;
            justify-content: center;
            width: 100%;
        }
         .errorColor {
            color: red;
        }

    </style>
    @yield('css')
</head>
<!-- body start -->
<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        @include('admin.body.admin_header')
        <!-- end Topbar -->
        @include('admin.body.admin_sidebar')
        <!-- Left Sidebar End -->
        <div class="content-page">
            @yield('main-content')
            <!-- Footer Start -->
            @include('admin.body.admin_footer')
            <!-- end Footer -->
        </div>
    </div>
    <!-- END wrapper -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> New Order</h5>
          <button type="button" class="close" id="modalClose" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <p id="message"></p>
        </div>
        <div class="modal-footer">
            <a class="btn btn-info" href="{{ route('role.pending.orders',config('fortify.guard')) }}">Order Processing</a>
          <button type="button" id="modalClose" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('996dd98a58691c981ce6', {
          cluster: 'ap2'
        });
        var channel = pusher.subscribe('my-channel');
        console.log(channel,'running from custom')
        channel.bind('my-event', function(data) {
            console.log(data.message);
            $('#message').append(data.message);
            // alert(data.message);
             $('#exampleModal').modal('show');
        });
      </script>

    <!-- Vendor js -->
    <script src="{{ asset('backend/assets') }}/js/vendor.min.js"></script>
    <!-- Plugins js-->
    <script src="{{ asset('backend/assets') }}/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/apexcharts/apexcharts.min.js"></script>
    <!-- <script src="{{ asset('backend/assets') }}/libs/selectize/js/standalone/selectize.min.js"></script> -->
    <!-- Dashboar 1 init js-->
    <script src="{{ asset('backend/assets') }}/js/pages/dashboard-1.init.js"></script>
    <!-- App js-->
    <script src="{{ asset('backend/assets') }}/js/app.min.js"></script>
    <!-- Chart JS -->
    {{-- <script src="{{ asset('backe0nd/assets') }}/libs/chart.js/Chart.bundle.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Init js -->
    <script src="{{ asset('backend/assets') }}/js/pages/chartjs.init.js"></script>
    <!-- init js -->
    <script src="{{ asset('backend/assets') }}/js/pages/apexcharts.init.js"></script>
    <!--Morris Chart-->
    <script src="{{ asset('backend/assets') }}/libs/morris.js06/morris.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/raphael/raphael.min.js"></script>
    <!-- Init js -->
    <script src="{{ asset('backend/assets') }}/js/pages/morris.init.js"></script>
    <!-- Toastr cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type') }}"
            switch (type) {

            case 'info':
                toastr.options = {
                    "showDuration": "300000",
                    "hideDuration": "100000",
                    "timeOut": "500000",
                    "extendedTimeOut": "100000",
                    }
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success("{{ Session::get('message') }} ");

            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            default:
            break;
            }
        @endif
    </script>

    {{-- sweet alert note.... --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        }); // main funcations end

        $('#modalClose').on('click',function()
        {
            console.log('herer');
            $('#exampleModal').modal('toggle');
        });
    </script>
    {{-- for sweet alert --}}
    {{-- script for dataTable --}}
    <!-- third party js -->
    <script src="{{ asset('backend/assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js">
    </script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script src="{{ asset('backend/assets') }}/js/pages/datatables.init.js"></script>
    @yield('script')
</body>

</html>
