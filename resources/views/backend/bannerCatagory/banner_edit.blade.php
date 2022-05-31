@extends('admin.admin_master')

@section('main-content')
<div class="row">

<div class="col-lg-3"></div>
<div class="col-lg-6">
    <div class="card mt-2">
        <div class="card-header with-border">
          <h3 class="card-title">Edit Banner</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <form method="POST" action="{{ route('role.bannerCategory.update',config('fortify.guard')) }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $bennars->id }}">
                <input type="hidden" name="old_img" value="{{ $bennars->bennar_img}}">

                           <div class="form-group">
                            <h5> Banner Title <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" id=" banner_title"  name="banner_title" value="{{ $bennars->banner_title }}" class="form-control">

                            @error('bennar_img')
                            <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                             @enderror

                         </div>
                           <h5> Banner Img <span class="text-danger">*</span></h5>
                           <div class="controls">
                           <input type="file" id=" bennar_img"  name="bennar_img" class="form-control" required="Input Img">

                           @error('bennar_img')
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                      </div><br>

                   <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Update Banner">
                </div>
               </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>

    <div class="col-lg-3"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@endsection
