@extends('admin.admin_master')

@section('main-content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Add Expence</h4>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left: 1140px" >
                            Add Expense Type
                        </button>
                    </div>
                        <!-- The Modal -->
                        <div class="modal" id="myModal" >
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div>
                                    <div class="col-md-8">
                                        <div class="form-group" >
                                            <h5> <span class="text-danger">*</span>Add Expense Type</h5>
                                            <div class="controls">
                                            <input type="text" id="expense_type_value" name="add_expense_type" class="form-control"> <br>
                                        </div>
                                        </div>
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-2" style="display: flex">
                                            <input type="button" id="expense_btn" class="btn btn-rounded btn-success mb-5" value="ADD">
                                            <button type="button" class="btn btn-rounded btn-secondary mb-5" data-bs-dismiss="modal" style="margin-left: 30px" >Close</button>
                                        </div> <!-- end col md 4 -->
                                    </div>
                                </div>
                                <!-- Modal footer -->
                            </div>
                            </div>
                        </div>
                        {{-- end modal --}}

                         <form action="{{route('role.expense.store',config('fortify.guard'))}}" method="POST" enctype="multipart/form-data">
                             @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5> <span class="text-danger">*</span>Date</h5>
                                        <div class="controls">
                                        <input type="date" id="date" name="date" class="form-control">
                                        @error('date')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col md 4 -->

                                <div class="col-md-4">
                                        <div class="form-group">
                                            <h5> <span class="text-danger">*</span> Expence type</h5>
                                                <div class="controls">
                                            <select id="expence_type" name="expence_type"class="form-control">
                                                    <option selected disabled>Select expence_type</option>
                                                @foreach ($expense_type as $e_t )
                                                <option value="{{$e_t->id }}" >{{ $e_t->expense_type }}</option>
                                                @endforeach

                                                </select>
                                                @error('expence_type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                </div> <!-- end col md 4 -->

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5> <span class="text-danger">*</span>Amount</h5>
                                        <div class="controls">
                                        <input type="number" id="amount" name="amount" class="form-control" placeholder="0000">
                                        @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col md 4 -->
                            </div>
                            <div class="row"> <!-- start 2st row  -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5> <span class="text-danger">*</span> Payment Type</h5>
                                            <div class="controls">
                                        <select id="payment_type" name="payment_type"class="form-control">
                                                <option selected disabled>Payment Type</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Bank">Bank </option>
                                                <option value="Bkash">Bkash </option>

                                            </select>
                                            @error('payment_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col md 4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="file" id="image" name="expense_image" class="form-control">
                                        @error('expense_image')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                </div> <!-- end col md 4 -->
                            </div> <!-- end 2st row  -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Expense Short Descraption<span class="text-danger">*</span></h5>
                                        <textarea name="expense_short_descp" rows="5"  id="textarea" class="form-control"  placeholder="Textarea text"></textarea>
                                    </div>
                                        @error('product_short_descp')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div> <!-- end col md 4 -->
                            <button class="btn btn-success mt-2" type="submit">Add Expense</button>
                        </form>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->

@endsection


@section('script')

{{-- <script src="{{asset('js/axios.min.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $("#expense_btn").click(()=>{
    let value= $("#expense_type_value").val();

        if(value!="")
        {
            $exType = {
                'add_expense_type':value,
            };


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
               type:'POST',
               url:"{{ route('role.add.expnse.type',config('fortify.guard')) }}",
               data:$exType,
               success:function(data) {

                    $.ajax({
                        type:'GET',
                        url:"{{ route('role.get.expnse.type',config('fortify.guard')) }}",

                        success:function(response) {
                            $("#expense_type_value").val("");
                            let expenseType =response.expense_name.expense_type;
                            $("#expence_type").append(new Option(expenseType,response.expense_name.id));
                            $('.btn-close').trigger('click');
                        },
                        error:function(e)
                        {
                            console.log(e);
                        }
                    });


               },
               error:function(e)
               {
                   console.log(e);
               }
            });

        }
    });
</script>
@endsection

