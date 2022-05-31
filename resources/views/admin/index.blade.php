@extends('admin.admin_master')
@section('main-content')

    @php
    $date = now('d');
    $today = App\Models\Order::whereDate('order_date', $date)
        ->where('status', '=', 'delivered')
        ->sum('amount');
    $asset = App\Models\Asset::all();
    $month = date('F');
    $monthly = App\Models\Order::where('order_month', $month)
        ->where('status', '=', 'delivered')
        ->sum('amount');
    $year = date('Y');
    $yearly = App\Models\Order::where('order_year', $year)->where('status','=', 'delivered')->sum('amount');
    $pending = App\Models\Order::where('status','pending')->get();
    $total_delivery = App\Models\Order::where('status','delivered')->get();
    $total_confirm_order = App\Models\Order::where('status','confirm')->get();
    $total_cancel_order = App\Models\Order::where('status','cancel')->get();
    $total_shipped_order = App\Models\Order::where('status','shipped')->get();
    $total_processing_order = App\Models\Order::where('status','processing')->get();
    $total_picked_order = App\Models\Order::where('status','picked')->get();
    $categoriesStock = App\Models\Product::select( DB::raw('SUM(product_qty) as total'),'category_name')
    ->join('categories','products.category_id','categories.id')
    ->groupBy('categories.category_name')
    ->get();


    $categoriesIds = App\Models\Category::pluck('id');
    $categories = App\Models\Category::with(['ordersProduct'])
        ->limit(10)
        ->get();

    $categoryNameProductQty = [];
    foreach ($categories as $category) {
        $categoryName = '';

        if ($category->category_name !== $categoryName && $category->ordersProduct()->count() > 0) {
            $maxQty = $category->ordersProduct()->sum('order_items.qty');
            $categoryName = $category->category_name;
            $categoryNameProductQty[] = ['category_name' => $categoryName, 'max_qty' => $maxQty];
        }
    }
    // dd($categoryNameProductQty);
    $dataPoints2 = [];
    $dataPoints = [];

    foreach ($categoryNameProductQty as $categoryAndQty) {
        $dataPoints[] = ['label' => $categoryAndQty['category_name'], 'y' => $categoryAndQty['max_qty']];
    }

    foreach ($categoriesStock as $categories) {
        $dataPoints2[] = ['label' => $categories['category_name'], 'y' => $categories['total']];
    }

    @endphp

    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.sale.report', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                        <i class="fas fa-tag font-22 avatar-title text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Todays Sale</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $today }}</span> TK</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.sale.report', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                        <i class="fas fa-money-bill-alt font-22 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Monthly Sale</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $monthly }}</span> TK</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.sale.report', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fas fa-money-bill-alt font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Yearly Sale</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $yearly }}</span>TK</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.all.admin.user', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                        <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        @php
                                        $admins = App\Models\Admin::all()->count();
                                        @endphp
                                        <p class="text-muted mb-1 text-truncate">Total Admin</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $admins }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                    <a href="{{ route('role.employee.view' , config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row"> 
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fas fa-user-friends font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        @php
                                        $employees = App\Models\Employee::all()->count();
                                        @endphp
                                        <p class="text-muted mb-1 text-truncate">Total Employee</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $employees }}</span></h3>
                                    </div>
                                </div>                            
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.all-users', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                        <i class="fas fa-user-friends font-22 avatar-title text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        @php
                                        $users = App\Models\User::all()->count();
                                        @endphp
                                        <p class="text-muted mb-1 text-truncate">Total User</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $users }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.sallary-report-view', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                        <i class=" fas fa-dollar-sign font-22 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        @php
                                        $paidSalarys = App\Models\Department_salary::sum('paid_salary');
                                        @endphp
                                        <p class="text-muted mb-1 text-truncate">Total Paid Salary</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $paidSalarys }}</span>TK</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.sallary-report-view', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-secondary border-secondary border">
                                        <i class="fas fa-dollar-sign font-22 avatar-title text-secondary"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        @php
                                        $dueSalarys = App\Models\Department_salary::sum('due_salary');
                                        @endphp
                                        <p class="text-muted mb-1 text-truncate">Total Due Salary</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $dueSalarys }}</span>TK</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.delivered-orders', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                        <i class="fas fa-check font-22 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Total Delivered Product</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($total_delivery) }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.pending.orders', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-secondary border-secondary border">
                                        <i class="fas fa-hourglass-half font-22 avatar-title text-secondary"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Total Pending Orders</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($pending) }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.confirmed-orders', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                        <i class=" fas fa-redo font-22 avatar-title text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Total Confirmed Order</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($total_confirm_order) }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.confirm-processing', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fas fa-shopping-cart font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Total Processing Order</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($total_processing_order) }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.picked-orders', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fas fa-sync-alt font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Total Picked Order</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($total_picked_order) }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.shipped-orders', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-pink border-pink border">
                                        <i class="fas fa-exclamation-triangle font-22 avatar-title text-pink"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Total Shipped Order</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($total_shipped_order) }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.cancel-orders', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                                        <i class="fas fa-trash-alt font-22 avatar-title text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Total Cancel Order</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($total_cancel_order) }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <a href="{{ route('role.expense.list', config('fortify.guard')) }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                        <i class="fas fa-user-friends font-22 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Debit</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $asset[0]->debit }}</span>TK</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-pink border-pink border">
                                        <i class="fas fa-user-friends font-22 avatar-title text-pink"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Credit</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $asset[0]->credit }}</span>TK</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                        <i class="fas fa-dollar-sign font-22 avatar-title text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <p class="text-muted mb-1 text-truncate">Asset</p>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $asset[0]->credit - $asset[0]->debit }}</span>TK</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="Chart card">
                        <div class="card-body">
                            <h4 class="header-title">Current Stock</h4>

                            <div class="mt-4 chartjs-chart" style="height: 420px; width:420px; position:relative" >
                                <canvas id="donut-chart-example" ></canvas>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="Chart card">
                        <div class="card-body">
                            <h4 class="header-title">Category wise Total Product</h4>

                            <div class="mt-4 chartjs-chart" style="height: 420px; width:420px; position:relative">
                                <canvas id="pie-chart-example"  class="mt-4" data-colors="#6658dd,#fa5c7c,#4fc6e1,#ebeff2"></canvas>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <!-- Portlet card -->
                    <div class="Chart card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase6" role="button" aria-expanded="false" aria-controls="cardCollpase6"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Monthly Sale</h4>

                            <div id="cardCollpase6" class="collapse pt-3 show" dir="ltr" style="height: 700px; width:700px; " >
                                <canvas id="barChart" ></canvas>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="Chart card" dir="ltr">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Total Profit & Expense</h4>
                            <div  >
                                <div id="morris-donut-example"  class="morris-chart" data-colors="#4fc6e1,#6658dd,#ebeff2"></div>
                            </div>
                            <div class="text-center">
                                <p class="text-muted font-15 font-family-secondary mb-0">
                                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Total Profit</span>
                                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-info"></i> Total Expense </span>
                                    {{--  <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-light"></i> Litecoin</span>  --}}
                                </p>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@section('css')

<style>

    .Chart {
        height: 600px;

    }

</style>

@endsection


@section('script')


<script>
var donutValue = [];
    $.ajax({
        type:'GET',
        url:'/get/donut',
        success:function(data) {
            console.log(data);
            const ctx = document.getElementById('donut-chart-example');

            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Total Purchase', 'Selling Product', 'Current Stock'],
                    datasets: [{
                        label: 'Product Info',
                        data: data,
                        backgroundColor: [

                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(153, 102, 255, 0.2)',

                        ],
                        borderColor: [

                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',


                        ],

                        hoverOffset: 4
                    }]
                },

            });
        }
    });
</script>

<script>

    $.ajax({
        type: "GET",
        url: "/get/bar",
        success: function (data) {
            //console.log(data);
            var barkeys = Object.keys(data);
            console.log(barkeys);
            var barArray=[];

            for(var i=1;i<=12;i++)
            {
                if(i<10)
                {
                    var check = '0'+i;
                    check =  check.toString();
                }
                else
                {
                   var check=i;
                   check =  check.toString();
                }

                if(data[check] !== undefined)
                {
                    barArray.push(data[check]);
                }
                else
                {
                    barArray.push(0);
                }

            }

            console.log(barArray);

            const ctx = document.getElementById('barChart');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
                    datasets: [{
                        label: 'Total Number of Sale',
                        data: barArray,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                }
            });
        }
    });
</script>


<script>
    var morrisValue = [];
    $.ajax({
        type: "GET",
        url: "/get/morris",
        success: function (data) {
            console.log(data);

            Morris.Donut({
                element: 'morris-donut-example',
                data: [
                  {label: " Profit ", value: data[0]},
                  {label: " Expense ", value: data[1]},
                  //{label: "Litecoin", value: 20}

                ],
                colors: ["#4fc6e1", "#6658dd"],

              });
        }
    });


</script>

<script>

    var categoryName =[];
    var numberOfproduct =[];
    var colorOfChart =[];
    $.ajax({
        type: "GET",
        url: "/get/pie",
        success: function (data) {
            //console.log(data);
            for(var i = 0;i<data.length;i++)
            {
                categoryName.push(data[i].category_name);
                numberOfproduct.push(data[i].products_count);
                var randomColor = random_rgba();
                colorOfChart.push(randomColor);

            }

            //console.log(categoryName);
            //console.log(numberOfproduct);
           // console.log(colorOfChart);
            const ctx = document.getElementById('pie-chart-example');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: categoryName,
                    datasets: [{
                        label: 'Category wise number of product',
                        data: numberOfproduct,
                        backgroundColor: colorOfChart,
                        borderColor: colorOfChart,
                        hoverOffset: 4



                    }]
                },

            });
        }
    });


    function random_rgba() {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
    }

</script>


@endsection
