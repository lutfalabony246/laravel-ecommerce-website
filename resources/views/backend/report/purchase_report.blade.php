@extends('admin.admin_master')
@section('main-content')
    {{-- <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('role.purchase.report.store', config('fortify.guard')) }}" method="POST"
                    enctype="multipart/form-data" class=" mt-4">
                    @csrf
                    <div class="row mt-4">
                        <h3>Purchase</h3>
                        <hr>


                        <div class="col-xl-4">
                            <div class="form-group">
                                <h5>Purchase Type <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="due_amount" class="category_id form-select form-control">
                                        <option value="" selected="" disabled="">Select Supplier
                                        </option>
                                        @foreach ($purchases as $dueamount)
                                            <option value="{{ $dueamount->due_amount }}">
                                                {{ $dueamount->due_amount }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- </form>
                            <!-- /.box-body -->
                        </div>
                        <button type="submit" class="btn btn-success mt-3"><a
                                href="{{ route('role.purchase.report.view', config('fortify.guard')) }}">Search</a></button>

                        {{-- </div> --}}
    {{-- 2nd one --}}
    {{-- <div class="col-xl-4">
                            <div class="form-group">
                                <h5>Payment Method <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="payment_method" class="category_id form-select form-control">
                                        <option value="" selected="" disabled="">Select Payment Method
                                        </option>
                                        @foreach ($purchases as $paymentmethod)
                                            <option value="{{ $paymentmethod->payment_method }}">
                                                {{ $paymentmethod->payment_method }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <button type="submit" class="btn btn-success mt-3"><a
                                href="{{ route('role.purchase.report.view', config('fortify.guard')) }}">Search</a></button>

                    </div>
                </form>

            </div>

        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header" style="background-color: #fff; border-bottom: 1px solid #ced4da;">
                        <h4>Search By Date</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('role.purchase.report.store', config('fortify.guard')) }}">
                            @csrf
                            <div class="form-group">
                                <h5>Select Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="date" class="form-control">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-blue mt-2" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header" style="background-color: #fff; border-bottom: 1px solid #ced4da;">
                        <h4>Search By Month</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('role.purchase.report.store', config('fortify.guard')) }}">
                            @csrf
                            <div class="form-group">
                                <h5>Select Month <span class="text-danger">*</span></h5>
                                <div class="controls">

                                    <select name="month" class="form-control">
                                        <option label="Choose One"></option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="Jun">Jun</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>

                                    </select>

                                    @error('month')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Select Year <span class="text-danger">*</span></h5>
                                <div class="controls">

                                    <select name="year_name" class="form-control">
                                        <option label="Choose One"></option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2026">2027</option>
                                        <option value="2026">2028</option>
                                        <option value="2026">2029</option>
                                        <option value="2026">2030</option>
                                    </select>

                                    @error('year_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <button class="btn btn-blue mt-2" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header" style="background-color: #fff; border-bottom: 1px solid #ced4da;">
                        <h4>Select Year</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('role.purchase.report.store', config('fortify.guard')) }}">
                            @csrf
                            <div class="form-group">
                                <h5>Select Year <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="year" class="form-control">
                                        <option label="Choose One"></option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2026">2027</option>
                                        <option value="2026">2028</option>
                                        <option value="2026">2029</option>
                                        <option value="2026">2030</option>
                                    </select>
                                    @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-blue mt-2" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection
