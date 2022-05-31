@extends('admin.admin_master')

@section('main-content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        {{-- <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Datatables</li>
                        </ol>
                    </div>
                 
                </div>
            </div>
        </div> --}}
        <!-- end page title -->

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Site Setting Page </h4>
                </div>

               <!-- /.box-header -->
               <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('role.update.sitesetting',config('fortify.guard')) }}" enctype="multipart/form-data">
                                @csrf
                                {{--  <input type="hidden" name="_token" value="FmYlCaFQ21iGFdWN9W5TxtoCK7BoKYgK2Sj463Rx">  --}}
                                <input type="hidden" name="id" value="{{$setting->id }}">

                                <div class="row">

                                     <div class="col-12">
                                            <div class="row">

                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Main Logo  <span class="text-danger"> </span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="logo" class="form-control" value="{{ $setting->logo }}" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Phone One <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="phone_one" class="form-control" value="{{ $setting->phone_one }}" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Phone Two <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="phone_two" class="form-control"  value="{{ $setting->phone_two }}" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Email <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                        <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Company Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                        <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Company Address <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="company_address" class="form-control" value="{{ $setting->company_address }}">
                                                        </div>
                                                    </div>

                                                </div> <!-- col-lg-6 -->

                                                <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <h5>Facebook <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <h5>Twitter <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="twitter" class="form-control"  value="{{ $setting->twitter }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <h5>Linkedin <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="linkedin" class="form-control"  value="{{ $setting->linkedin }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <h5>Youtube <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="youtube" class="form-control"  value="{{ $setting->youtube }}">
                                                            </div>
                                                        </div>

                                                </div> <!-- end col md 4 -->

                                            </div>	<!-- end row -->
                                            <br>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update">
                                            </div>
                                    </div> <!-- end col-12 -->
                                </div> <!-- end row -->

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


    </div> <!-- container -->

</div> <!-- content -->

@endsection
