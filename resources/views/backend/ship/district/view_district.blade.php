@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full">
 <section class="content">

<div class="row">
    <div class="col-lg-8">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">District List</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Division Name</th>
                         <th>District Name</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>

                    @foreach($districts as $item)
                        <tr>
                            <td> {{ $item->division->division_name }}  </td>
                            <td> {{ $item->district_name }}  </td>

                            <td>
                                <a href="{{ route('role.district.edit',[config('fortify.guard'),$item->id]) }}" class="btn btn-info" title="Edit Data">
                                    <i class="fa fa-pencil"></i> </a>

                                <a href="{{ route('role.district.delete',[config('fortify.guard'),$item->id]) }}" class="btn btn-danger" title="Delete Data" id="">
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
     <h3 class="box-title">Add District</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


         <form  method="POST" action="{{ route('role.district.store',config('fortify.guard')) }}" >

            @csrf


            <div class="form-group">
                <h5> Division Name <span class="text-danger">*</span></h5>
                      <div class="controls">
                          <select name="division_id"  required="" id="division_id" class="form-control" aria-invalid="false">
                              <option value="" selected="" disabled="" >Select Division </option>

                              @foreach($division as $div)
                              <option value="{{ $div->id }}" > {{ $div->division_name }}</option>
                              @endforeach

                          </select>
                          @error('division_id')
                          <span  class="text-danger">
                          <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
            </div>

                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> District Name</h5>
                      <div class="controls">
                      <input type="text" id="district_name" name="district_name" class="form-control" >

                      @error('district_name')
                      <span  class="text-danger">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror

                    </div>
                </div> <!-- end group-->


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

