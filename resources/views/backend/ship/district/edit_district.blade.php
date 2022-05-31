@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full">
 <section class="content">

<div class="row">

<div class="col-lg-8">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit District</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


         <form  method="POST" action="{{ route('district.update', $districts->id) }}" >

            @csrf


            <div class="form-group">
                <h5> Division Name <span class="text-danger">*</span></h5>
                      <div class="controls">
                          <select name="division_id"  required="" id="division_id" class="form-control" aria-invalid="false">
                              <option value="" selected="" disabled=""  >Select Division </option>

                              @foreach($division as $div)
                              <option value="{{ $div->id }}" {{ $div->id == $districts->division_id ? 'selected':'' }}>{{ $div->division_name }}</option>
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
                      <input type="text" id="district_name" value="{{ $districts->district_name }}" name="district_name" class="form-control" >

                      @error('district_name')
                      <span  class="text-danger">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror

                    </div>
                </div> <!-- end group-->


               </div>
                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="Update Division">
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

