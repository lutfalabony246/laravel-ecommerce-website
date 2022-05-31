 @extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full">
 <section class="content">

<div class="row">

<!--================================form add Department======================================- -->

<div class="col-lg-12">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit  Department</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
         <form  method="POST" action="{{ route('department.update', $department->id ) }}" >
             @csrf
             <input type="hidden" name="id" value="{{ $department->id }}" />
                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Department Name</h5>
                      <div class="controls">
                      <input type="text" id="department_name" value="{{$department->department_name}}" name="department_name" class="form-control" >
                      @error('department_name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{$message}}</strong>
                      </span>
                  @enderror
                     </div>
                      </div>
                      </div>
               </div>
                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="Update Department">
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

