@extends('admin.admin_master')

@section('main-content')

<div class="content">

    <div class="employee-pay-container-wrapper pt-5">
        <div class="card">
            <div class="employee-title">Employee Salary</div>
            <div class="card-body">
                <form id="findEmployee">
                    @csrf
                    <div class="employee-container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="dprt-name" class="form-label">Department</label>
                                    <select class="form-select" name="department" id="department">
                                        <option value="">Department Name</option>
                                        @foreach ($department as $item)
                                            <option value="{{$item->id}}">{{ $item->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Employee</label>
                                    <select class="form-select" name="employee" id="employee">
                                        <option>Employee ID And Name</option>
                                        {{--  @foreach ($employee as $emp)
                                            <option value="{{$emp->id}}">{{$emp->employee_name}}</option>
                                        @endforeach  --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="humanfd-datepicker" class="form-label">Employee Joining Date</label>
                                    <input class="form-control" type="date" id="date" name="date" placeholder="joining date" required>
                                    <div class="invalid-feedback">
                                        please write your joining date
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12 pt-3 mt-1">
                                <button id="submitE" class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

    <div class="show-employee-pay-container-wrapper" id='pay_salary'>
        <div class="card">
            <div class="employee-title">Employee Salary</div>
            <div class="card-body">
                <form id='information' method="POST" action="{{route('role.payment_salary',config('fortify.guard'))}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="employee-container">
                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <div class="employee-info">
                                    <h5>Name : <span id="name"></span> </h5>
                                    <h5 class="pt-1"><span id= "id"></span></h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="employee-info">
                                    <h5>Total Salary : <span id= "total"></span> </h5>
                                    <h5 class="pt-1">Paid Salary:  <span id= "paid"></span></h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <div class="employee-info">
                                    <h5>Due Salary : <span id= "due"></span> </h5>
                                    <h5 class="pt-1">Advance Salary: <span id= "advance"></span></h5>
                                    <h5 class="pt-1">Bonus Salary: <span id= "bonus"></span></h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <input type="text" id="employee_id" name="id" hidden>
                                <div class="mb-3">
                                    <label for="pay" class="form-label">Pay Salary</label>
                                    <input type="number" class="form-control" name="paid" id="pay" placeholder="Pay Salary"
                                        required />
                                    <div class="invalid-feedback">
                                        salary
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <input type="text" id="employee_id" name="id" hidden >
                                <div class="mb-3">
                                    <label for="pay" class="form-label">Bonus Salary</label>
                                    <input type="number" class="form-control" name="bonus" id="pay" placeholder="Bonus Salary" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <input type="text" id="employee_id" name="id" hidden >
                                <div class="mb-3">
                                    <label for="pay" class="form-label">Advance Salary</label>
                                    <input type="number" class="form-control" name="advance" id="pay" placeholder="Advance Salary" />
                                </div>
                            </div>


                            

                           {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                                <input type="text" id="employee_id" name="id" hidden >
                                <div class="mb-3">
                                    <label for="pay" class="form-label">Added By</label>
                                    <input type="text" class="form-control" name="added_by" id="pay" placeholder="Advance Salary" />
                                </div>
                            </div>  --}}



                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

</div> <!-- container -->

@endsection

@section('script')


    <script>
        $(function() {
            $('#pay_salary').hide();
            $('#department').on('change', function(e) {
                $('#pay_salary').hide();
                if ($('#department').find(":selected").val()) {
                    var value = $('#department').find(":selected").val();
                    $.ajax({
                        type: 'GET',
                        url: `/{{ config('fortify.guard')}}/salary/get_employee` + '/' + value,

                        dataType: 'json',
                        success: function(data) {

                            $('#employee').empty();
                            $.each(data, function(key, value) {
                                var h = "<option value=" + value.id + ">" + value
                                    .employee_name + "</option>";

                                $('#employee').append(h);
                            });
                        },
                        error: function(data) {
                            console.log('not ok');
                            console.log(data);
                        }
                    });

                }

            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $("#submitE").on('click', function(e) {

                if ($('#department').find(":selected").val() && $('#employee').find(":selected").val() && $(
                        '#date').val()) {

                    $('#pay_salary').hide();

                    var data = $('#findEmployee').serialize();
                    e.preventDefault();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                    $.ajax({
                        type: 'POST',
                        url: '{{ route('role.employee.find',config('fortify.guard')) }}',
                        data: data,
                        dataType: 'json',
                        success: function(data) {


                            if (data[0].id) {
                                console.log('HAS DATA');
                                $('#pay_salary').show();
                                $("[id='employee_id']").val(data[0].id);

                                console.log(data[0].id);
                                $('#id').text(data[1].employee_office_id);
                                $('#name').text(data[1].employee_name);
                                $('#total').text(data[1].employee_salary);
                                $('#paid').text(data[0].paid_salary);
                                $('#due').text(data[0].due_salary);
                                $('#advance').text(data[0].advance_salary);
                                $('#bonus').text(data[0].bonus);
                            } else {
                                console.log('NO DATA');
                                console.log('empty');
                            }
                        },
                        error: function(error) {
                            console.log('not ok');
                            console.log(error);
                        }

                    });

                }

            });
        });
    </script>

@endsection
