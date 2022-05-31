@extends('admin.admin_master')
 {{-- section id is yeild name  --}}
 @section('main-content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <section class="content">
              <div class="card">
                  <div class="card-body">
                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Admin Profile</h4>
                     <h6 class="box-subtitle">Profile Edit<a class="text-warning">  </a></h6>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form  method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                             <div class="row">
                               <div class="col-6">
                                   <div class="form-group">
                                       <h5>Admin Name <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                           <input type="text" value="{{ $editData->name}}" name="name" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                   </div>
                                   </div>
                                   <div class="col-6">
                                   <div class="form-group">
                                       <h5>Admin Email  <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                           <input type="email" value=" {{ $editData->email }} " name="email" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                     </div>
                                    </div>
                                   </div>   {{-- row end --}}
                                   <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <h5>Admin Profile Photo <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="image" type="file" name="profile_photo_path" class="form-control" required=""> <div class="help-block"></div></div>
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <h5>Admin Profile View <span class="text-danger">*</span></h5>
                                    <img id="showImage"
                                    src="{{ (!empty($editData->profile_photo_path))?url('upload/admin_images/'
                                   .$editData->profile_photo_path):url('upload/avatar-1.png') }}" height="200" width="200" >
                                   </div>
                                </div>   {{-- row end --}}
                                   <div class="">
                                   <button type="submit" class="btn btn-rounded btn-info">Submit</button>
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
                  </div>
              </div>
    </section>
     <script>
        $(document).ready(function (){
                    $('#image').change(function (e){
                        var reader = new FileReader();
                        reader.onload = function (e){
                            $('#showImage').attr('src', e.target.result);
                        }
                        // first index is visiable is [0];
                        reader.readAsDataURL(e.target.files['0']);
                    });
                });
     </script>
  @endsection