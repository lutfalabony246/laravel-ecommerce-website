@extends('admin.admin_master')

@section('main-content')
{{-- <div class="row" style="margin-top: -100px"> --}}
 
    <div class="content-page" style="margin:-30px 0px 0px 0px" >
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-9 m-auto">
                        <div class="card">
                            <div class="card-title banner-header-title" style="color: black; font-weight: bold;">Banner</div>
                            <div class="card-body">
                                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row">
                              
                            </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable-buttons_info" style="width: 1168px;">
                                    <thead>
                                        <tr role="row">
                                           
                                            <th>Banner Image </th>
                                            <th>Banner Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
         
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($bennars as $banner)

                                     <tr>

                                        <td>
                                            <img src="{{asset($banner->bennar_img)}}" alt="..." height="100"
                                                width="150">
                                        </td>
            
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->description	 }}</td>
                                        <td>
                                            @if($banner->status === 1)
                                                <p>Active</p>
                                            @else
                                                <p>Inactive</p>
                                            @endif
                                        </td>
                                        <td>
                                         <a href="{{route('role.bennar.edit',[config('fortify.guard'),$banner->id ])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                         <a href="{{route('role.bennar.delete',[config('fortify.guard'),$banner->id ])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>\
                                         @if($banner->status ==1)
                                         
                                         <a href="{{route('role.bennar.deactive',[config('fortify.guard'),$banner->id])}}" class="btn btn-danger"><i class="fas fa-arrow-down"></i></a>
                                         @else
                                         <a href="{{route('role.bennar.active',[config('fortify.guard'),$banner->id])}}" class="btn btn-success"><i class="fas fa-long-arrow-alt-up"></i></a>

                                         @endif


                                        </td>
                                     </tr>
   
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                
                 </div>
                  </div> <!-- end card body-->
                        </div><!-- end card -->
                    </div><!-- end col-->

                  
                   <div class="col-lg-3">

                        
                            <form method="POST" action="{{ route('role.bennar.store',config('fortify.guard'))  }}" enctype="multipart/form-data">

                                <div class="add-banner-container">
                                    <h3 style="text-align: center">Add Banner</h3>

                                @csrf
                    
                                <div class="form-group">
                                   <h5>Banner Title<span class="text-danger"></span></h5>
                                   <div class="controls">
                                     <input id="title" name="title" type="text"  class="form-control
                                     " id="exampleInputEmail1" aria-describedby="emailHelp">
                                     @error('title')
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror                 
                    
                                 </div>                    
                             </div>


                                        
                             <div class="form-group">
                                 <h5>Banner Description <span class="text-danger"></span></h5>
                                 <div class="controls">
                                     <input type="text"  id="description" name="description" class="form-control" >
                                 @error('description')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror
                    
                                 </div>
                    
                             </div>
                                       
                             <div class="form-group">
                                 <h5>Banner Image <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                  <input type="file" id="bennar_img" name="bennar_img" class="form-control" >
                    
                               </div>
                               @error('bennar_img')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror
                              </div><br>
                
                              <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" style="background-color: #269746" value="Add Banner">
                            </div>
                    
                      </form>
                    </div> 

                </div>
                <!-- end row-->
                
            </div> <!-- container -->
        </div> <!-- content -->
</div>
       
        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script>2022 © UBold theme by <a href="">Coderthemes</a> 
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

@endsection

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> --}}



