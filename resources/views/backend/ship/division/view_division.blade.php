@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full">
 <section class="content">

<div class="row">
    <div class="col-lg-8">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Division List</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Division Name</th>
                         <th>Action</th>

                     </tr>
                 </thead>
                 <tbody>

                    @foreach($divisions as $item)
                        <tr>
                            <td> {{ $item->division_name }}  </td>

                            <td>
                                <a href="{{ route('role.division.edit',[config('fortify.guard'),$item->id]) }}" class="btn btn-info" title="Edit Data">
                                    <i class="fa fa-pencil"></i> </a>

                                <a href="{{ route('role.division.delete',[config('fortify.guard'),$item->id]) }}" class="btn btn-danger" title="Delete Data" id="">
                                     <i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach

                 </tbody>

               </table>
               </div> <!-- table res.. end -->
             </div>  <!-- box body end -->
          </div>      <!-- box end -->
     </div> <!-- col end -->



<!--================================form add Category======================================- -->

<div class="col-lg-4">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Division</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


         <form  method="POST" action="{{ route('role.division.store',config('fortify.guard')) }}" >

            @csrf

                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Division Name</h5>
                      <div class="controls">
                      <input type="text" id="division_name" name="division_name" class="form-control" >

                      @error('division_name')
                      <span  class="text-danger">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror

                     </div>


                      </div>


               </div>

                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="Add Division">
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

