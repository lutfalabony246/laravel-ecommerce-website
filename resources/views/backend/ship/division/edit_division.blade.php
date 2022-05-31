@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full">
 <section class="content">

<div class="row">

<div class="col-lg-8">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">update Division</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


         <form  method="POST" action="{{ route('division.update',$divisions->id) }}" >

            @csrf

                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Division Name</h5>
                      <div class="controls">
                      <input type="text" id="division_name" value="{{ $divisions->division_name }}" name="division_name" class="form-control" >

                      @error('division_name')
                      <span  class="text-danger">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror

                     </div>


                      </div>


               </div>

                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="update Division">
              </div>

          </form>
         </div> <!-- table res.. end -->
       </div>  <!-- box body end -->
    </div>      <!-- box end -->
</div> <!-- col end -->

</div> <!--  row end-->
</section> <!--  content end-->
</div> <!--  row end-->






@endsection

