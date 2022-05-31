@extends('admin.admin_master')
@section('css')
    <style>
        .badge {
            color: #323a46 !important;

        }

    </style>
    {{--  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  --}}

@endsection

@section('main-content')
    <div class="content">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Manage Product Deals</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                                <form method="POST" action="" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" id="product_id" name="id" hidden>

                                                    <div class="form-group">
                                                        <h4 class="text-center"><strong> Find Product </strong>
                                                            <span class="text-danger">*</span>
                                                        </h4>
                                                        <div class="controls">
                                                            <select name="product_id" class="form-control" data-toggle="select2" id="deals">
                                                                <option > select </option>
                                                                @foreach ($products as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->product_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-lg-3"></div>

                                            {{-- <div class="col-lg-1">
                                        <div class="form-group mt-5" style="padding-top: 1.5rem">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Find">
                                        </div>
                                    </div> --}}

                                            </form>
                                        </div>

                                        <div class="row" style="padding-top: 25px">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form id='information' method="POST"
                                                            action="{{ route('role.deals.store', config('fortify.guard')) }}"
                                                            enctype="multipart/form-data">

                                                            @csrf
                                                            <input type="text" id="hot_deals" name="id" hidden>
                                                            <div class="form-group">
                                                                <h5><strong>Hot Deals</strong> <span class="text-danger"></span>
                                                                </h5>
                                                                <div class="controls ">
                                                                    <input type="date" id="hot_deal" name="hot_deal"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                    </div>

                                                    <div class="col-lg-1">
                                                        <div class="form-group mt-2" style="padding-top: 1.5rem">
                                                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                                        </div>
                                                    </div>

                                                    </form>
                                                </div>

                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form id='information' method="POST"
                                                            action="{{ route('role.deals.store', config('fortify.guard')) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="text" id="offer_deals" name="id" hidden>
                                                            <div class="form-group">
                                                                <h5><strong>Special Offer</strong> <span
                                                                        class="text-danger"></span> </h5>
                                                                <div class="controls">
                                                                    <input type="date" id="special_offer" name="special_offer"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="form-group mt-2" style="padding-top: 1.5rem">
                                                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                                        </div>
                                                    </div>

                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form id='information' method="POST"
                                                            action="{{ route('role.deals.store', config('fortify.guard')) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="text" id="special_deals" name="id" hidden>

                                                            <div class="form-group">
                                                                <h5><strong>Special Deals</strong> <span
                                                                        class="text-danger"></span> </h5>
                                                                <div class="controls">
                                                                    <input type="date" id="special_deal" name="special_deal"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="form-group mt-2" style="padding-top: 1.5rem">
                                                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                                        </div>
                                                    </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{--  <div class="row">
                                            <div class="col-lg-6">
                                                <form id='information' method="POST"
                                                    action="{{ route('role.deals.store', config('fortify.guard')) }}"
                                                    enctype="multipart/form-data">

                                                    @csrf
                                                    <input type="text" id="hot_deals" name="id" hidden>
                                                    <div class="form-group">
                                                        <h5><strong>Hot Deals</strong> <span class="text-danger"></span>
                                                        </h5>
                                                        <div class="controls ">
                                                            <input type="date" id="hot_deal" name="hot_deal"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="col-lg-1">
                                                <div class="form-group mt-2" style="padding-top: 1.5rem">
                                                    <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                                </div>
                                            </div>

                                            </form>
                                        </div>  --}}

                                        {{--  <div class="row">
                                            <div class="col-lg-6">
                                                <form id='information' method="POST"
                                                    action="{{ route('role.deals.store', config('fortify.guard')) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" id="offer_deals" name="id" hidden>
                                                    <div class="form-group">
                                                        <h5><strong>Special Offer</strong> <span
                                                                class="text-danger"></span> </h5>
                                                        <div class="controls">
                                                            <input type="date" id="special_offer" name="special_offer"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group mt-2" style="padding-top: 1.5rem">
                                                    <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                                </div>
                                            </div>

                                            </form>
                                        </div>  --}}

                                        {{--  <div class="row">
                                            <div class="col-lg-6">
                                                <form id='information' method="POST"
                                                    action="{{ route('role.deals.store', config('fortify.guard')) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" id="special_deals" name="id" hidden>

                                                    <div class="form-group">
                                                        <h5><strong>Special Deals</strong> <span
                                                                class="text-danger"></span> </h5>
                                                        <div class="controls">
                                                            <input type="date" id="special_deal" name="special_deal"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group mt-2" style="padding-top: 1.5rem">
                                                    <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                                </div>
                                            </div>

                                            </form>
                                        </div>  --}}
                                    </div>
                                    {{-- box end --}}
                                </div>
                                {{-- col-12 end --}}
                            </div>
                            {{-- main row end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- main row end --}}
        <div class="container-fluid mt-0" >
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table id="datatable-buttons"
                                                    class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Hot Deals</th>
                                                            <th>Special Offer</th>
                                                            <th>Special Deals</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tottal_offer as $view)
                                                            <tr>
                                                                <td>{{ $view['products']['product_name'] }}</td>

                                                                <td>
                                                                    @if ($view->hot_deals >= Carbon\Carbon::now()->format('Y-m-d'))
                                                                        <span class="badge badge-pill bg-success">Active
                                                                            (
                                                                            {{ $view->hot_deals }} )</span>
                                                                    @elseif($view->hot_deals == true)
                                                                        <span class="badge badge-pill bg-danger">Hot
                                                                            Deals Date Expeir</span>
                                                                    @else
                                                                        <span class="badge badge-pill bg-warning">No Hot
                                                                            Deals Offer </span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($view->special_offer >= Carbon\Carbon::now()->format('Y-m-d'))
                                                                        <span class="badge badge-pill bg-success">Active
                                                                            (
                                                                            {{ $view->special_offer }} )</span>
                                                                    @elseif($view->special_offer == true)
                                                                        <span class="badge badge-pill bg-danger">Special
                                                                            Offer Date
                                                                            Expeir</span>
                                                                    @else
                                                                        <span class="badge badge-pill bg-warning">No
                                                                            Special Offer </span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($view->special_deals >= Carbon\Carbon::now()->format('Y-m-d'))
                                                                        <span class="badge badge-pill bg-success">Active
                                                                            (
                                                                            {{ $view->special_deals }} )</span>
                                                                    @elseif($view->special_deals == true)
                                                                        <span class="badge badge-pill bg-danger">Special
                                                                            Deals Date
                                                                            Expeir</span>
                                                                    @else
                                                                        <span class="badge badge-pill bg-warning">No
                                                                            Special Deals Offer
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div> <!-- table res.. end -->
                                        </div> <!-- box body end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    @endsection
    @section('script')
        <script>
            $(() => {


                $('#deals').change(() => {

                    var product_value = $('#deals').find(":selected").val();


                    $('#hot_deals').val(product_value);
                    $('#special_deals').val(product_value);
                    $('#offer_deals').val(product_value);


                });

            });
        </script>
    @endsection


