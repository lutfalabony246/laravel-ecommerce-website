

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

    .top_right{

        margin-left: 900px;
        display:flex;
    }

    </style>


<div class="row" style="margin:30px 10px" >
    
    <div class="col-md-7">
        <div class="card">

            <form class="" id="sort_cities" action="" method="GET">
                <div class="card-header row gutters-5" >
                  
            <div class="form-group row" style="display: flex">
                <div class="col-md-1">
                    <h5>States</h5> 
                </div>
               
                    <input class="col-md-3" style="margin-left:360px;" type="text" class="form-control" id="sort_country" name="sort_country" placeholder="Type country name">
         
                     
                        <div class="col-lg-2">
                            <select class="form-control" name="">
                                    <option value="en">English</option>
                                    <option value="ar">Arabic</option>
                                    <option value="bn">Bangla</option>
                                    <option value="hi">Hindi</option>
                                    <option value="fr">France</option>
                           </select>
                        </div>
                        
                    <div class="col-md-1">
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                    <input type="hidden" name="" value="" placeholder="Select Country" style="margin-left: 90px">
             
          </div>

                </div>
            </form>
            <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                           <th>SI</th>
                           <th>Name</th>
                           <th>Code</th>
                           <th>Show/Hide</th>
                           <th>Action</th>

                          
                        </tr>
                    </thead>
                    <tbody>

                     
                       <tr>

                          <td style="color: #8a99b5;">English</td>
                          <td style="color: #8a99b5;">en</td>
                          <td style="color: #8a99b5;">W</td>
                          <td style="color: #8a99b5;">
                            
                            
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                              </label>
                        
                        </td>
                         
                         
                        <td>
                            
                          <button class="btn btn-success btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-danger btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                     

                        </td>
                       



                       </tr>

                       <tr>

                        <td style="color: #8a99b5;">Bangla</td>
                        <td style="color: #8a99b5;">bn</td>
                        <td style="color: #8a99b5;">R</td>
                        <td>
                            
                            
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                              </label>
                        
                        </td>
                       
                        <td>
                            
                          <button class="btn btn-success btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-danger btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                     

                        </td>
                       

                       


                     </tr>



                      
                    </tbody>
                  </table>
                
            </div>
        </div>



    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Add New State</h5>
            </div>
            <div class="card-body">
                <form action="https://shop.activeitzone.com/admin/states" method="POST">
                    <input type="hidden" name="_token" value="rQ0A8qBCvzZ1dM7V1o9fl0tltoxYNJx9OHDkDAMo">    					
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Name" name="name" class="form-control" required="">
                    </div>


                    <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="">
                                <option value="en">United States</option>
                                <option value="ar">Dubai</option>
                                <option value="bn">Bangladesh</option>
                                <option value="hi">India</option>
                                <option value="fr">Pakistan</option>
                       </select>
                    </div>


                    <div class="form-group mb-3 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
