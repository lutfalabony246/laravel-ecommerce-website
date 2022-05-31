
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



<div class="col-md-8" style="margin: 30px 250px">
    <div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Cash Payment Activation</h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="" method="POST">
           
            <input type="hidden" name="_token" value="">  
    
    
            <div class="form-group row">
                <input type="hidden" name="types[]" value="">
                <div class="col-md-3">
                    <label class="col-from-label">Activation</label>
                </div>
                <div class="col-md-7">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                      </label>                            
                    </div>
            </div>
     
            <div class="col-lg-3" style="margin-left: 870px" >
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>
    
    </div>
    </div>




    <div class="row" style="margin:20px 20px" >
        <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Paypal Credential</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST">
                    <input type="hidden" name="_token" value="">  
        
        
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="MAIL_HOST">
                        <div class="col-md-3">
                            <label class="col-from-label">Activation </label>
                        </div>
                        <div class="col-md-7">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                              </label>                            
                            </div>
                    </div>       
        
        
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="">
                        <div class="col-md-3">
                            <label class="col-from-label">Paypal Client Id</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Paypal Client Id">
                        </div>
                    </div>
        
        
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="MAIL_HOST">
                        <div class="col-md-3">
                            <label class="col-from-label">Paypal Client Secret</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Paypal Client Secret">
                        </div>
                    </div>


                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="MAIL_HOST">
                        <div class="col-md-3">
                            <label class="col-from-label">Paypal Sandbox Mode</label>
                        </div>
                        <div class="col-md-7">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                              </label>                            
                            </div>
                    </div>
        
                    <div class="col-lg-3" style="margin-left: 630px" >
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>

                </form>
            </div>
        </div>
        </div>
                 
        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Sslcommerz Credential</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="" method="POST">
                        <input type="hidden" name="_token" value="">  
               
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-md-3">
                                <label class="col-from-label">Activation</label>
                            </div>
                            <div class="col-md-7">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                  </label>                            
                                </div>
                        </div>        
               
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-md-3">
                                <label class="col-from-label">Sslcz Store Id</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="MAIL_HOST" placeholder="Sslcz Store Id">
                            </div>
                        </div>
     
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-md-3">
                                <label class="col-from-label">Sslcz store password</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="MAIL_HOST" placeholder="Sslcz store password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-md-3">
                                <label class="col-from-label">Sslcommerz Sandbox Mode</label>
                            </div>
                            <div class="col-md-7">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                  </label>                            
                                </div>
                        </div>
        
                        <div class="col-lg-3" style="margin-left: 630px" >
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
        
                    </form>
                </div>
            </div>
            </div>


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Stripe Credential</h5>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="" method="POST">
                            <input type="hidden" name="_token" value="">  
                   
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_HOST">
                                <div class="col-md-3">
                                    <label class="col-from-label">Activation</label>
                                </div>
                                <div class="col-md-7">
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                      </label>                            
                                    </div>
                            </div>        
                   
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_HOST">
                                <div class="col-md-3">
                                    <label class="col-from-label">Stripe Key</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="MAIL_HOST" placeholder="Stripe Key">
                                </div>
                            </div>
         
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_HOST">
                                <div class="col-md-3">
                                    <label class="col-from-label">Stripe Secret</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="MAIL_HOST" placeholder="Stripe Secret">
                                </div>
                            </div>
    
                           
            
                            <div class="col-lg-3" style="margin-left: 630px" >
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
            
                        </form>
                    </div>
                </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">PayStack Credential</h5>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="" method="POST">
                                <input type="hidden" name="_token" value="">  
                       
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_HOST">
                                    <div class="col-md-3">
                                        <label class="col-from-label">Activation</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                          </label>                            
                                        </div>
                                </div>        
                       
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_HOST">
                                    <div class="col-md-3">
                                        <label class="col-from-label">PUBLIC KEY</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_HOST" placeholder="PUBLIC KEY">
                                    </div>
                                </div>
             
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_HOST">
                                    <div class="col-md-3">
                                        <label class="col-from-label">SECRET KEY</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_HOST" placeholder="SECRET KEY">
                                    </div>
                                </div>
        

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_HOST">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MERCHANT EMAIL</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_HOST" placeholder="MERCHANT EMAIL">
                                    </div>
                                </div>
                               
                
                                <div class="col-lg-3" style="margin-left: 630px" >
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                
                            </form>
                        </div>
                    </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Flutterwave Credential</h5>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" action="" method="POST">
                                    <input type="hidden" name="_token" value="">  
                           
                                    <div class="form-group row">
                                        <input type="hidden" name="types[]" value="MAIL_HOST">
                                        <div class="col-md-3">
                                            <label class="col-from-label">Activation</label>
                                        </div>
                                        <div class="col-md-7">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                              </label>                            
                                            </div>
                                    </div>        
                           
                                    <div class="form-group row">
                                        <input type="hidden" name="types[]" value="MAIL_HOST">
                                        <div class="col-md-3">
                                            <label class="col-from-label">FLW_PUBLIC_KEY</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="MAIL_HOST" placeholder="FLW_PUBLIC_KEY">
                                        </div>
                                    </div>
                 
                                    <div class="form-group row">
                                        <input type="hidden" name="types[]" value="MAIL_HOST">
                                        <div class="col-md-3">
                                            <label class="col-from-label">FLW_SECRET_KEY</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="MAIL_HOST" placeholder="FLW_SECRET_KEY">
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <input type="hidden" name="types[]" value="MAIL_HOST">
                                        <div class="col-md-3">
                                            <label class="col-from-label">FLW_SECRET_HASH</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="MAIL_HOST" placeholder="FLW_SECRET_HASH">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <input type="hidden" name="types[]" value="MAIL_HOST">
                                        <div class="col-md-3">
                                            <label class="col-from-label">FLW_PAYMENT_CURRENCY_CODE</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="MAIL_HOST" placeholder="FLW_PAYMENT_CURRENCY_CODE">
                                        </div>
                                    </div>


                    
                                    <div class="col-lg-3" style="margin-left: 630px" >
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                    
                                </form>
                            </div>
                        </div>
                        </div>
        
        
        
        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">Facebook Login Credential</h5>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" action="" method="POST">
                                        <input type="hidden" name="_token" value="">  
                               
                                        <div class="form-group row">
                                            <input type="hidden" name="types[]" value="MAIL_HOST">
                                            <div class="col-md-3">
                                                <label class="col-from-label">Activation</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                  </label>                            
                                                </div>
                                        </div>        
                               
                                        <div class="form-group row">
                                            <input type="hidden" name="types[]" value="MAIL_HOST">
                                            <div class="col-md-3">
                                                <label class="col-from-label">PAYTM ENVIRONMENT</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="MAIL_HOST" placeholder="PAYTM ENVIRONMENT">
                                            </div>
                                        </div>
                     
                                        <div class="form-group row">
                                            <input type="hidden" name="types[]" value="MAIL_HOST">
                                            <div class="col-md-3">
                                                <label class="col-from-label">PAYTM MERCHANT ID</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="MAIL_HOST" placeholder="PAYTM MERCHANT ID">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <input type="hidden" name="types[]" value="MAIL_HOST">
                                            <div class="col-md-3">
                                                <label class="col-from-label">PAYTM MERCHANT KEY</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="MAIL_HOST" placeholder="PAYTM MERCHANT KEY">
                                            </div>
                                        </div>
                
                                       
                                        <div class="form-group row">
                                            <input type="hidden" name="types[]" value="MAIL_HOST">
                                            <div class="col-md-3">
                                                <label class="col-from-label">PAYTM MERCHANT WEBSITE</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="MAIL_HOST" placeholder="PAYTM MERCHANT WEBSITE">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <input type="hidden" name="types[]" value="MAIL_HOST">
                                            <div class="col-md-3">
                                                <label class="col-from-label">PAYTM CHANNEL</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="MAIL_HOST" placeholder="PAYTM CHANNEL">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <input type="hidden" name="types[]" value="MAIL_HOST">
                                            <div class="col-md-3">
                                                <label class="col-from-label">PAYTM INDUSTRY TYPE</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="MAIL_HOST" placeholder="PAYTM INDUSTRY TYPE">
                                            </div>
                                        </div>

                        
                                        <div class="col-lg-3" style="margin-left: 630px" >
                                            <button type="submit" class="btn btn-info">Save</button>
                                        </div>
                        
                                    </form>
                                </div>
                            </div>
                            </div>           

        </div>





@endsection
