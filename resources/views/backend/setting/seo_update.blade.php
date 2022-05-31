@extends('admin.admin_master')

@section('main-content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">SEO Setting Page </h4>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col">


                        <form method="post" action="{{ route('role.update.seosetting',config('fortify.guard')) }}" >
                            @csrf
                            {{--  <input type="hidden" name="_token" value="FmYlCaFQ21iGFdWN9W5TxtoCK7BoKYgK2Sj463Rx">  --}}
                            <input type="hidden" name="id" value="1">

                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <h5>Meta Title <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="meta_title" class="form-control" value="{{ optional($seo)->meta_title }}" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Meta Author <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="meta_author" class="form-control"  value="{{optional($seo)->meta_author }}" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Meta Keyword <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="meta_keyword" class="form-control" value="{{ optional($seo)->meta_keyword }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Meta Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="meta_description" id="textarea" class="form-control" rows="10" cols="10"  placeholder="Textarea text">
                                                        {{ optional($seo)->meta_description }}
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Google Analytics <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="google_analytics" id="textarea" class="form-control" rows="5" cols="5"  placeholder="Textarea text">
                                                        {{ optional($seo)->google_analytics }}
                                                    </textarea>
                                                </div>
                                            </div>

                                        </div> <!-- end cold md 6 -->
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



    </div> <!-- container -->

</div> <!-- content -->

@endsection
