@extends('admin.admin_master')
@section('main-content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header" style="background-color: #fff; border-bottom: 1px solid #ced4da;">
                         <h4>Search By Date</h4>
                    </div>
                    <div class="card-body">
                            <form method="post" action="{{ route('role.search-by-date',config('fortify.guard')) }}" >
                                @csrf
                                 <div class="form-group">
                                    <h5>Select Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="date" class="form-control" >
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
                        <form method="post" action="{{ route('role.search-by-month',config('fortify.guard')) }}">
                        @csrf
                            <div class="form-group">
                                    <h5>Select Month  <span class="text-danger">*</span></h5>
                                    <div class="controls">

                                        <select name="month" class="form-control">
                                            <option label="Choose One"></option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
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
                                    <h5>Select Year  <span class="text-danger">*</span></h5>
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
                    <form method="post" action="{{ route('role.search-by-year',config('fortify.guard')) }}" >
                    @csrf
                    <div class="form-group">
                        <h5>Select Year  <span class="text-danger">*</span></h5>
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

</div> <!-- content -->

@endsection
