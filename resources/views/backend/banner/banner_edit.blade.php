@extends('admin.admin_master')

@section('main-content') 
    <div class="row" style="margin-top: 70px">

        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card mt-2" >
                <div class="card-header with-border">
                    <h3 class="card-title">Edit Banner</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('role.bennar.update',config('fortify.guard')) }}" enctype="multipart/form-data">  
                        @csrf

                        <input type="hidden" name="id" value="{{ $bennars->id }}">
                        <input type="hidden" name="old_img" value="{{ $bennars->bennar_img }}">

                        <div class="form-group">
                            <h5> <span class="text-danger">*</span> Banner Title</h5>
                            <div class="controls">
                                <input id="title" value="{{ $bennars->title }}" name="title" type="text"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Banner Description <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" value="{{ $bennars->description }}" id="description" name="description"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5> Banner Img <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" id=" bennar_img" name="bennar_img" class="form-control">
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
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

@endsection
