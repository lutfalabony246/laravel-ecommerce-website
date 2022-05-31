
@extends('admin.admin_master')
@section('admin')



<style>
  .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
  </style>


<br>
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">

<div class="row" style="margin:10px 20px" >
<div class="col-lg-6">
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Default Language</h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="_token" value="">
            <div class="form-group row">
                <div class="col-lg-3">
                    <label class="col-from-label">Default Language</label>
                </div>
                <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
                <div class="col-lg-6">
                    <select class="form-control demo-select2-placeholder" name="DEFAULT_LANGUAGE">
                                                                <option value="en" selected="">English</option>
                                                                <option value="ar">Arabic</option>
                                                                <option value="bn">Bangla</option>
                                                                <option value="hi">Hindi</option>
                                                                <option value="fr">France</option>
                                                        </select>
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<div class="aiz-titlebar text-left mt-1 mb-3">
<div class="align-items-center">
<div class="text-md-right" style="margin-right: 80px" >
<a href="{{route('role.laguage_information.view',config('fortify.guard'))}}" class="btn btn btn-info">
    <span>Add New Language</span>
    </a>
</div>
</div>
</div>



    <div class="container-full">
        <section class="content">
       <div class="row">
           <div class="col-md-12">

              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Language</h3> <br><br>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                               <th>Name</th>
                               <th>Code</th>
                               <th>RLT</th>
                               <th>Option</th>
                               {{-- <th>View Document</th> --}}


                            </tr>
                        </thead>
                        <tbody>


                           <tr>

                              <td style="color: #8a99b5;">English</td>
                              <td style="color: #8a99b5;">en</td>
                              <td style="color: #8a99b5;">


                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                  </label>

                            </td>
                              <td style="color: #8a99b5;">D</td>


                              {{-- <td><button type="button" class="btn btn-success">View</button></td> --}}



                           </tr>

                        </tbody>
                      </table>
                      </div> <!-- table res.. end -->
                    </div>  <!-- box body end -->
                 </div>      <!-- box end -->
            </div> <!-- col end -->
       </div> <!--  row end-->
       </section> <!--  content end-->
       </div> <!--  row end-->


</div>

    </div>

</div>

@endsection


