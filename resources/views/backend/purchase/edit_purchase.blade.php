@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Purchase </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                    <div class="col">


              <form action="{{route('purchase.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $purchase->id }}">        

                <div class="row">
                 <div class="col-12">	


            <div class="row"> <!-- start 1st row  -->
                <div class="col-md-4">
                <div class="form-group">
                    <h5> <span class="text-danger">*</span> Supplier Name</h5>
                    <div class="controls">
                        <select id="suppler_id" name="supplier_id"class="form-control" required>
                            <option value=" ">Select Supplier Name</option>

                           @foreach ($suppliers as $item)
                           @if ($purchase->supplier_id==$item->id)
                           <option value="{{$item->id}}" selected>{{$item->supplyer_name}}</option>
                           @else
                           <option value="{{$item->id}}">{{$item->supplyer_name}}</option> 

                           @endif

                             @endforeach 
                            
                         </select>                        
                          @error('supplier_id')
                    <strong>{{ $message }}</strong>	
                @enderror
                   
                   </div>
                    </div> 
                

                </div> <!-- end col md 4 -->


                
                <div class="col-md-4"> 

                            <div class="form-group">
                                <h5> <span class="text-danger">*</span> Product Name</h5>
                                <div class="controls">
                                {{-- <input type="text" id="product_name" value="{{ $purchase->product_name}}" name="product_name" class="form-control" required>  --}}

                                <select id="product_name" name="product_name"class="form-control" required>
                                    <option value=" ">Select Product Name</option>
                                    @foreach ($product as $product)
                                    @if($product->id==$purchase->product_id)
                                    <option value="{{$product->id}}" selected>{{$product->product_name}}</option>
                                    @else
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endif
    
                                    @endforeach
                                    
                                 </select>   
                                @error('product_name')
                                <strong>{{ $message }}</strong>	
                            @enderror
                               
                               </div>
                                </div> 

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span>Product Quantity</h5>
                        <div class="controls">
                        <input type="number" id="product_qty" value="{{ $purchase->product_qty}}"name="product_qty" class="form-control" required> 
                        @error('product_qty')
                        <strong>{{ $message }}</strong>	
                        
                    @enderror
                       
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

            </div> <!-- end 1st row  -->



            <div class="row"> <!-- start 2st row  -->
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <span class="text-danger">*</span>Total Amount</h5>
                        <div class="controls">
                        <input type="number" id="total_amount"value="{{ $purchase->total_amount}}" name="total_amount" class="form-control" required> 
                        @error('total_amount')
                        <strong>{{ $message }}</strong>	
                        
                    @enderror
                       
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span>Paid Amount</h5>
                        <div class="controls">
                        <input type="number" id="paid_amount"value="{{ $purchase->paid_amount}}" name="paid_amount" class="form-control" required> 
                        @error('paid_amount')
                        <strong>{{ $message }}</strong>	
                        
                    @enderror
                       
                       </div>
                        </div>

                </div> <!-- end col md 4 -->


                
            


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span>Due Amount</h5>
                        <div class="controls">
                        <input type="number" id="due_amount"value="{{ $purchase->due_amount}}" name="due_amount" class="form-control" required> 
                        @error('due_amount')
                        <strong>{{ $message }}</strong>	
                        
                    @enderror
                       
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

            </div> <!-- end 2st row  -->

            <div class="row"> <!-- start 3st row  -->
                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span>Purchase Date</h5>
                        <div class="controls">
                        <input type="date" id="purchase_date"value="{{ $purchase->purchase_date}}" name="purchase_date" class="form-control" required> 
                        @error('purchase_date')
                        <strong>{{ $message }}</strong>	
                        
                    @enderror
                       
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

                
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Purchase Create by</h5>
                        <div class="controls">
                        <input type="text" id="purchase_create_by" value="{{ $purchase->purchase_create_by}}"name="purchase_create_by" class="form-control" required> 
                        @error('purchase_create_by')
                        <strong>{{ $message }}</strong>	
                       
                    @enderror
                       </div>
                        </div>    

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span>Purchase Notes</h5>
                        <div class="controls">
                        <input type="text" id="purchase_note"value="{{ $purchase->purchase_note}}" name="purchase_note" class="form-control" required> 
                        @error('purchase_note')
                        <strong>{{ $message }}</strong>	
                       
                    @enderror
                       </div>
                        </div>  

                </div> <!-- end col md 4 -->

            </div> <!-- end 3st row  -->

          

        

      <br>
       <br>
       <br>

          <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>


@endsection

 

