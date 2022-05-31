
@extends('admin.admin_master')
@section('admin')



<style>
    .dark-skin .modal-content {
            background-color: #fdfeff;
            border-radius: 5px;
           
      }
</style>


<!--Start Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
     
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
  
            
            <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Name </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="language_name"  id="language_name" placeholder="Name" required="">
                </div>
            </div>
              
  
            <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Symbol </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="language_name"  id="language_name" placeholder="Symbol" required="">
                </div>
            </div>


             
            <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Code </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="language_name"  id="language_name" placeholder="Code" required="">
                </div>
            </div>
  
              <div class="form-group row">
                  <label for="example-search-input" class="col-sm-2 col-form-label">Exchange Rate </label>
                  <div class="col-sm-10">
                      <input class="form-control" type="text" name="language_name"  id="language_name" placeholder="Exchange Rate" required="">
                  </div>
              </div>
  
  
  
            <div class="box-footer">
                <button type="button" class="btn btn-rounded btn-info mb-5" data-bs-dismiss="modal" style="margin-left: 40px" >Submit</button>
                <button type="button" class="btn btn-rounded btn-danger mb-5" data-bs-dismiss="modal"style="margin-left: 20px">Close</button>

            </div>
  
    </form>
          
        </div>
        
      </div>
    </div>
  </div>
  <!--End Add Modal -->
  

<br>
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">
        
<div class="row" style="margin:10px 20px" >
<div class="col-lg-6">
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">System Default Currency</h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="_token" value="">                        
            <div class="form-group row">
                <div class="col-lg-3">
                    <label class="col-from-label">System Default Currency</label>
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




<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Set Currency Format</h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="" method="POST">
                <input type="hidden" name="_token" value="">                        
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-from-label">Symbol Format</label>
                    </div>
                    <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
                    <div class="col-lg-6">
                        <select class="form-control demo-select2-placeholder" name="DEFAULT_LANGUAGE">
                            <option value="1">[Symbol][Amount]</option>
                            <option value="2">[Amount][Symbol]</option>
                            <option value="3">[Symbol] [Amount]</option>
                            <option value="4">[Amount] [Symbol]</option>
                        </select>
                    </div>
                   
                </div>


                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-from-label">Decimal Separator</label>
                    </div>
                    <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
                    <div class="col-lg-6">
                        <select class="form-control demo-select2-placeholder" name="DEFAULT_LANGUAGE">
                            <option value="en" selected="">1,234,567.80</option>
                            <option value="ar">1.234.567,80</option>
                            
                      </select>
                    </div>
                   
                </div>


                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-from-label">No of decimals</label>
                    </div>
                    <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
                    <div class="col-lg-6">
                        <select class="form-control demo-select2-placeholder" name="DEFAULT_LANGUAGE">
                        <option value="#" selected="">123.45</option>
                        <option value="#">12345</option>
                        <option value="#">1234.5</option>
                        <option value="#">123.45</option>
                        <option value="#">12.345</option>
                     </select>
                 </div>
       </div>

                     <div class="col-lg-3" style="margin-left: 600px" >
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>

            </form>
        </div>
    </div>
    </div>
</div>





<div class="aiz-titlebar mt-3 mb-19">
<div class="align-items-center">
    <div class="col-lg-12" >
       
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 100rem">
Add Language
</button>

 
    </div>
</div>
</div>



    <div class="container-full ">
        <section class="content ">
       <div class="row mb-19">
           <div class="col-md-12">
    
              <div class="box ">
                <div class="box-header with-border">
                  <h3 class="box-title">All Currencies</h3> <br><br>
                </div>
    
               
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
    
                               <th>Currency name</th>
                               <th>Currency symbol</th>
                               <th>Currency cod</th>
                               <th>Exchange rate(1 USD = ?)</th>
                               <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
    
                          
                           <tr>
    
                              <td style="color: #8a99b5;">English</td>
                              <td style="color: #8a99b5;">en</td>
                              <td style="color: #8a99b5;">W</td>
                              <td style="color: #8a99b5;">D</td>
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


