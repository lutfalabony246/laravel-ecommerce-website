
@extends('admin.admin_master')

@section('admin')


<div class="aiz-main-content">
<div class="px-15px px-lg-25px">
        
<div class="row">
<div class="col-lg-8 mx-auto">
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">General Settings</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="tXuI1Maa7cHPkW75mlz1G2Jt29z0sha19lnDGtQ4">  
            <div class="form-group row">
                <label class="col-sm-3 col-from-label">System Name</label>
                <div class="col-sm-9">
                    <input type="hidden" name="types[]" value="site_name">
                    <input type="text" name="site_name" class="form-control" value="The Shop">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label">System Logo - White</label>
                <div class="col-sm-9">
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose Files</div>
                        <input type="hidden" name="types[]" value="system_logo_white">
                        <input type="hidden" name="system_logo_white" value="" class="selected-files">
                    </div>
                    <div class="file-preview box sm"></div>
                    <small>Will be used in admin panel side menu</small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label">System Logo - Black</label>
                <div class="col-sm-9">
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose Files</div>
                        <input type="hidden" name="types[]" value="system_logo_black">
                        <input type="hidden" name="system_logo_black" value="" class="selected-files">
                    </div>
                    <div class="file-preview box sm"></div>
                    <small>Will be used in admin panel topbar in mobile + Admin login page</small>
                </div>
            </div>

     <div class="form-group row">
        <label class="col-sm-3 col-from-label">System Timezone</label>
            <div class="col-sm-9">
                <div class="form-group">
                    
                    <select class="form-select" type="text" name="date_format"
                    data-placeholder="Choose a Category" tabindex="1">
                        
                                                                <option value="Pacific/Kwajalein">(GMT-12:00) International Date Line West</option>
                                                                <option value="Pacific/Midway">(GMT-11:00) Midway Island</option>
                                                                <option value="Pacific/Apia">(GMT-11:00) Samoa</option>
                                                                <option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
                                                                <option value="America/Anchorage">(GMT-09:00) Alaska</option>
                                                                <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                                <option value="America/Tijuana">(GMT-08:00) Tijuana</option>
                                                                <option value="America/Phoenix">(GMT-07:00) Arizona</option>
                                                                <option value="America/Denver">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                                <option value="America/Chihuahua">(GMT-07:00) Chihuahua</option>
                                                                <option value="America/Chihuahua">(GMT-07:00) La Paz</option>
                                                                <option value="America/Mazatlan">(GMT-07:00) Mazatlan</option>
                                                                <option value="America/Chicago">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                                <option value="America/Managua">(GMT-06:00) Central America</option>
                                                                <option value="America/Mexico_City">(GMT-06:00) Guadalajara</option>
                                                                <option value="America/Mexico_City">(GMT-06:00) Mexico City</option>
                                                                <option value="America/Monterrey">(GMT-06:00) Monterrey</option>
                                                                <option value="America/Regina">(GMT-06:00) Saskatchewan</option>
                                                                <option value="America/New_York">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                                <option value="America/Indiana/Indianapolis">(GMT-05:00) Indiana (East)</option>
                                                                <option value="America/Bogota">(GMT-05:00) Bogota</option>
                                                                <option value="America/Lima">(GMT-05:00) Lima</option>
                                                                <option value="America/Bogota">(GMT-05:00) Quito</option>
                                                                <option value="America/Halifax">(GMT-04:00) Atlantic Time (Canada)</option>
                                                                <option value="America/Caracas">(GMT-04:00) Caracas</option>
                                                                <option value="America/La_Paz">(GMT-04:00) La Paz</option>
                                                                <option value="America/Santiago">(GMT-04:00) Santiago</option>
                                                                <option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
                                                                <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                                                <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
                                                                <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Georgetown</option>
                                                                <option value="America/Godthab">(GMT-03:00) Greenland</option>
                                                                <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                                                                <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                                                <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                                                <option value="Africa/Casablanca">(GMT) Casablanca</option>
                                                                <option value="Europe/London">(GMT) Dublin</option>
                                                                <option value="Europe/London">(GMT) Edinburgh</option>
                                                                <option value="Europe/Lisbon">(GMT) Lisbon</option>
                                                                <option value="Europe/London">(GMT) London</option>
                                                                <option value="UTC">(GMT) UTC</option>
                                                                <option value="Africa/Monrovia">(GMT) Monrovia</option>
                                                                <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam</option>
                                                                <option value="Europe/Belgrade">(GMT+01:00) Belgrade</option>
                                                                <option value="Europe/Berlin">(GMT+01:00) Berlin</option>
                                                                <option value="Europe/Berlin">(GMT+01:00) Bern</option>
                                                                <option value="Europe/Bratislava">(GMT+01:00) Bratislava</option>
                                                                <option value="Europe/Brussels">(GMT+01:00) Brussels</option>
                                                                <option value="Europe/Budapest">(GMT+01:00) Budapest</option>
                                                                <option value="Europe/Copenhagen">(GMT+01:00) Copenhagen</option>
                                                                <option value="Europe/Ljubljana">(GMT+01:00) Ljubljana</option>
                                                                <option value="Europe/Madrid">(GMT+01:00) Madrid</option>
                                                                <option value="Europe/Paris">(GMT+01:00) Paris</option>
                                                                <option value="Europe/Prague">(GMT+01:00) Prague</option>
                                                                <option value="Europe/Rome">(GMT+01:00) Rome</option>
                                                                <option value="Europe/Sarajevo">(GMT+01:00) Sarajevo</option>
                                                                <option value="Europe/Skopje">(GMT+01:00) Skopje</option>
                                                                <option value="Europe/Stockholm">(GMT+01:00) Stockholm</option>
                                                                <option value="Europe/Vienna">(GMT+01:00) Vienna</option>
                                                                <option value="Europe/Warsaw">(GMT+01:00) Warsaw</option>
                                                                <option value="Africa/Lagos">(GMT+01:00) West Central Africa</option>
                                                                <option value="Europe/Zagreb">(GMT+01:00) Zagreb</option>
                                                                <option value="Europe/Athens">(GMT+02:00) Athens</option>
                                                                <option value="Europe/Bucharest">(GMT+02:00) Bucharest</option>
                                                                <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                                                <option value="Africa/Harare">(GMT+02:00) Harare</option>
                                                                <option value="Europe/Helsinki">(GMT+02:00) Helsinki</option>
                                                                <option value="Europe/Istanbul">(GMT+02:00) Istanbul</option>
                                                                <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                                                <option value="Europe/Kiev">(GMT+02:00) Kyev</option>
                                                                <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                                                <option value="Africa/Johannesburg">(GMT+02:00) Pretoria</option>
                                                                <option value="Europe/Riga">(GMT+02:00) Riga</option>
                                                                <option value="Europe/Sofia">(GMT+02:00) Sofia</option>
                                                                <option value="Europe/Tallinn">(GMT+02:00) Tallinn</option>
                                                                <option value="Europe/Vilnius">(GMT+02:00) Vilnius</option>
                                                                <option value="Asia/Baghdad">(GMT+03:00) Baghdad</option>
                                                                <option value="Asia/Kuwait">(GMT+03:00) Kuwait</option>
                                                                <option value="Europe/Moscow">(GMT+03:00) Moscow</option>
                                                                <option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
                                                                <option value="Asia/Riyadh">(GMT+03:00) Riyadh</option>
                                                                <option value="Europe/Moscow">(GMT+03:00) St. Petersburg</option>
                                                                <option value="Europe/Volgograd">(GMT+03:00) Volgograd</option>
                                                                <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                                                <option value="Asia/Muscat">(GMT+04:00) Abu Dhabi</option>
                                                                <option value="Asia/Baku">(GMT+04:00) Baku</option>
                                                                <option value="Asia/Muscat">(GMT+04:00) Muscat</option>
                                                                <option value="Asia/Tbilisi">(GMT+04:00) Tbilisi</option>
                                                                <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                                                <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                                                <option value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                                <option value="Asia/Karachi">(GMT+05:00) Islamabad</option>
                                                                <option value="Asia/Karachi">(GMT+05:00) Karachi</option>
                                                                <option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
                                                                <option value="Asia/Kolkata">(GMT+05:30) Chennai</option>
                                                                <option value="Asia/Kolkata">(GMT+05:30) Kolkata</option>
                                                                <option value="Asia/Kolkata">(GMT+05:30) Mumbai</option>
                                                                <option value="Asia/Kolkata">(GMT+05:30) New Delhi</option>
                                                                <option value="Asia/Kathmandu">(GMT+05:45) Kathmandu</option>
                                                                <option value="Asia/Almaty">(GMT+06:00) Almaty</option>
                                                                <option value="Asia/Dhaka">(GMT+06:00) Astana</option>
                                                                <option value="Asia/Dhaka">(GMT+06:00) Dhaka</option>
                                                                <option value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk</option>
                                                                <option value="Asia/Colombo">(GMT+06:00) Sri Jayawardenepura</option>
                                                                <option value="Asia/Rangoon">(GMT+06:30) Rangoon</option>
                                                                <option value="Asia/Bangkok">(GMT+07:00) Bangkok</option>
                                                                <option value="Asia/Bangkok">(GMT+07:00) Hanoi</option>
                                                                <option value="Asia/Jakarta">(GMT+07:00) Jakarta</option>
                                                                <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                                <option value="Asia/Hong_Kong">(GMT+08:00) Beijing</option>
                                                                <option value="Asia/Chongqing">(GMT+08:00) Chongqing</option>
                                                                <option value="Asia/Hong_Kong">(GMT+08:00) Hong Kong</option>
                                                                <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk</option>
                                                                <option value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                                                <option value="Australia/Perth">(GMT+08:00) Perth</option>
                                                                <option value="Asia/Singapore">(GMT+08:00) Singapore</option>
                                                                <option value="Asia/Taipei">(GMT+08:00) Taipei</option>
                                                                <option value="Asia/Irkutsk">(GMT+08:00) Ulaan Bataar</option>
                                                                <option value="Asia/Urumqi">(GMT+08:00) Urumqi</option>
                                                                <option value="Asia/Tokyo">(GMT+09:00) Osaka</option>
                                                                <option value="Asia/Tokyo">(GMT+09:00) Sapporo</option>
                                                                <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                                                <option value="Asia/Tokyo">(GMT+09:00) Tokyo</option>
                                                                <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                                                <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                                                <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                                                <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                                                <option value="Australia/Sydney">(GMT+10:00) Canberra</option>
                                                                <option value="Pacific/Guam">(GMT+10:00) Guam</option>
                                                                <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                                                <option value="Australia/Melbourne">(GMT+10:00) Melbourne</option>
                                                                <option value="Pacific/Port_Moresby">(GMT+10:00) Port Moresby</option>
                                                                <option value="Australia/Sydney">(GMT+10:00) Sydney</option>
                                                                <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                                                <option value="Asia/Magadan">(GMT+11:00) Magadan</option>
                                                                <option value="Asia/Magadan">(GMT+11:00) New Caledonia</option>
                                                                <option value="Asia/Magadan">(GMT+11:00) Solomon Is.</option>
                                                                <option value="Pacific/Auckland">(GMT+12:00) Auckland</option>
                                                                <option value="Pacific/Fiji">(GMT+12:00) Fiji</option>
                                                                <option value="Asia/Kamchatka">(GMT+12:00) Kamchatka</option>
                                                                <option value="Pacific/Fiji">(GMT+12:00) Marshall Is.</option>
                                                                <option value="Pacific/Auckland">(GMT+12:00) Wellington</option>
                                                                <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                        
                    </select>
                </div>

            </div> 
</div>

            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label">Admin login page background</label>
                <div class="col-sm-8">
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary">Browse</div>
                        </div>
                        <div class="form-control file-amount">1 File selected</div>
                        <input type="hidden" name="types[]" value="admin_login_background">
                        <input type="hidden" name="admin_login_background" value="1639" class="selected-files">
                    </div>
                    <div class="file-preview box sm"><div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="1639" title="featured screenshots – 1.png"><div class="align-items-center align-self-stretch d-flex justify-content-center thumb"><img src="https://shop.activeitzone.com/public/uploads/all/pHAsOlhk6k80hKyOUBP1gLsIg5SGkt86uUxDY4fH.png" class="img-fit"></div><div class="col body"><h6 class="d-flex"><span class="text-truncate title">featured screenshots – 1</span><span class="ext flex-shrink-0">.png</span></h6><p>965 KB</p></div><div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div></div></div>
                </div>
            </div>



     <div class="form-group row">
        <label class="col-sm-3 col-from-label">Default weight unit</label>
            <div class="col-sm-9">
                <div class="form-group">
                    
                    <select class="form-select" type="text" name="date_format"
                    data-placeholder="Choose a Category" tabindex="1">
                        
                    <option value="kg">kg</option>
                    <option value="gm">gm</option>
                    <option value="lbs">lbs</option>
                    <option value="og">og</option>
                        
                    </select>
                </div>

            </div> 


</div>




            <div class="form-group row">
                <label class="col-sm-3 col-from-label">Default dimensions unit</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="types[]" class="form-control" value="dimension_unit">
                        <div class="form-group">
                            
                            <select class="form-select" type="text" name="date_format"
                            data-placeholder="Choose a Category" tabindex="1">
                                
                            <option value="m">m</option>
                            <option value="cm">cm</option>
                            <option value="mm">mm</option>
                            <option value="in">in</option>
                            <option value="yd">yd</option>
                            </select>
                        </div>
        
                    </div> 
        
        
        </div>


            <div class="text-right">
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
        </form>
    </div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-8 mx-auto">
<div class="card">
    <div class="card-header">
        <h1 class="mb-0 h6">Cache Settings</h1>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="tXuI1Maa7cHPkW75mlz1G2Jt29z0sha19lnDGtQ4">                        
            <div class="form-group row">
                <label class="col-sm-3 col-from-label">Current cache version</label>
                <div class="col-sm-9">
                    <div class="form-control bg-soft-secondary">qjpqdmuc583s8gpwmevngvgxnecdfk</div>
                    <input type="hidden" name="types[]" value="force_cache_clear_version">
                    <input type="hidden" name="force_cache_clear_version" class="form-control" value="jij2zzbdxdrvnpp5cszixcv67vsckv">
                </div>
            </div>
            <div class="text-right">
                  <button type="submit" class="btn btn-primary">Force Clear Cache</button>
              </div>
        </form>
    </div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-8 mx-auto">
<div class="card">
    <div class="card-header">
        <h1 class="mb-0 h6">Features Activation</h1>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-6 col-from-label">Forcefully HTTPS redirection</label>
            <div class="col-sm-6">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'FORCE_HTTPS')" checked="">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label class="col-from-label">Email Verification</label>
                <i>
                    <code>(You need to configure SMTP correctly to enable this feature.</code> <a href="">Configure Now</a>)
                </i>
            </div>
            <div class="col-sm-6">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'email_verification')">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-6 col-from-label">Wallet System Activation</label>
            <div class="col-sm-6">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'wallet_system')" checked="">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-8 mx-auto">
<div class="card">
    <div class="card-header">
        <h1 class="mb-0 h6">Chat setting</h1>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="tXuI1Maa7cHPkW75mlz1G2Jt29z0sha19lnDGtQ4">                        
            <div class="form-group row">
                <label class="col-md-3 col-from-label">Chat logo</label>
                <div class="col-md-8">
                    <div class=" input-group " data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">1 File selected</div>
                        <input type="hidden" name="types[]" value="customer_chat_logo">
                        <input type="hidden" name="customer_chat_logo" class="selected-files" value="895">
                    </div>
                    <div class="file-preview"><div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="895" title="Group 8863.png"><div class="align-items-center align-self-stretch d-flex justify-content-center thumb"><img src="https://shop.activeitzone.com/public/uploads/all/F6EJf2zCKL0EQB0Kt7CC1liE3fMbYqfMnCgMYPPK.png" class="img-fit"></div><div class="col body"><h6 class="d-flex"><span class="text-truncate title">Group 8863</span><span class="ext flex-shrink-0">.png</span></h6><p>2 KB</p></div><div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div></div></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-from-label">Chat name</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="customer_chat_name">
                        <input type="text" class="form-control" placeholder="" name="customer_chat_name" value="The Shop Support">
                    </div>
                </div>
            </div>
            <div class="text-right">
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
        </form>
    </div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-8 mx-auto">
<div class="card">
    <div class="card-header">
        <h1 class="mb-0 h6">Invoice setting</h1>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="tXuI1Maa7cHPkW75mlz1G2Jt29z0sha19lnDGtQ4">                        
            <div class="form-group row">
                <label class="col-md-3 col-from-label">Invoice logo</label>
                <div class="col-md-8">
                    <div class=" input-group " data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">1 File selected</div>
                        <input type="hidden" name="types[]" value="invoice_logo">
                        <input type="hidden" name="invoice_logo" class="selected-files" value="896">
                    </div>
                    <div class="file-preview"><div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="896" title="Group 8864.png"><div class="align-items-center align-self-stretch d-flex justify-content-center thumb"><img src="https://shop.activeitzone.com/public/uploads/all/fdSYLhZbkbSpM2tczZnm9U8EYeakHVeiUJ98aJDp.png" class="img-fit"></div><div class="col body"><h6 class="d-flex"><span class="text-truncate title">Group 8864</span><span class="ext flex-shrink-0">.png</span></h6><p>2 KB</p></div><div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div></div></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-from-label">Address</label>
                <div class="col-md-8">
                    <input type="hidden" name="types[]" value="invoice_address">
                    <input type="text" class="form-control" placeholder="Address" name="invoice_address" value="1329 40th St, Apt A, Orlando, FL">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-from-label">Email</label>
                <div class="col-md-8">
                    <input type="hidden" name="types[]" value="invoice_email">
                    <input type="text" class="form-control" placeholder="Email" name="invoice_email" value="support@theshop.com">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-from-label">Phone</label>
                <div class="col-md-8">
                    <input type="hidden" name="types[]" value="invoice_phone">
                    <input type="text" class="form-control" placeholder="Phone" name="invoice_phone" value="+01-321-200-6932">
                </div>
            </div>
            <div class="text-right">
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
        </form>
    </div>
</div>
</div>
</div>


    </div>
  
</div>


@endsection
