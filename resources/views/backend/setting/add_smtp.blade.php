@extends('admin.admin_master')
@section('admin')


<div class="aiz-main-content za">
    <div class="px-15px px-lg-25px">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-30 ml-20">

                    <div class="card-header">
                        <h5 class="mb-0 h6">SMTP Settings</h5>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal" action="" method="POST">
                            <input type="hidden" name="_token" value="gf3zFR8lSS0WGfalPojeBoB2RCfN4WsKXPwpMk01">

                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-from-label">Type</label>
                                </div>
                                <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
                                <div class="col-md-7">
                                    <select class="form-control demo-select2-placeholder" name="DEFAULT_LANGUAGE">
                                    <option value="#" selected="">Sendmail</option>
                                    <option value="#">SMTP</option>
                                    <option value="#">Mailgun.5</option>
                                    </select>
                                </div>
                            </div>

                            <div id="smtp">

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_HOST">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAIL HOST</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_HOST" value="smtp.gmail.com" placeholder="MAIL HOST">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_PORT">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAIL PORT</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_PORT" value="465" placeholder="MAIL PORT">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_USERNAME">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAIL USERNAME</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_USERNAME" value="admin@example.com" placeholder="MAIL USERNAME">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAIL PASSWORD</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_PASSWORD" value="123456" placeholder="MAIL PASSWORD">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAIL ENCRYPTION</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="ssl" placeholder="MAIL ENCRYPTION">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAIL FROM ADDRESS</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="admin@example.com" placeholder="MAIL FROM ADDRESS">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAIL FROM NAME</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAIL_FROM_NAME" value="no-reply" placeholder="MAIL FROM NAME">
                                    </div>
                                </div>
                            </div>

                            <div id="mailgun" style="display: none;">
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAILGUN_DOMAIN">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAILGUN DOMAIN</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAILGUN_DOMAIN" value="" placeholder="MAILGUN DOMAIN">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="MAILGUN_SECRET">
                                    <div class="col-md-3">
                                        <label class="col-from-label">MAILGUN SECRET</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="MAILGUN_SECRET" value="" placeholder="MAILGUN SECRET">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0" style="margin-left: 630px" >
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-md-6 sk" style="margin-left:-15px">
                    <div class="card mt-20" style="margin-left:10px">
                        <div class="card-header">
                            <h5 class="mb-0 h6">Test SMTP configuration</h5>
                        </div>

                        <div class="card-body">
                            <form action="" method="post">
                                <input type="hidden" name="_token" value="gf3zFR8lSS0WGfalPojeBoB2RCfN4WsKXPwpMk01">
                                <div class="row">
                                    <div class="col">
                                        <input type="email" class="form-control" name="email" value="admin@example.com" placeholder="Enter your email address">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Send test email</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card bg-gray-light" style="margin-left: 10px">
                        <div class="card-header">
                            <h5 class="mb-0 h6">Instruction</h5>
                        </div>

                        <div class="card-body ">
                            <p class="text-danger">Please be carefull when you are configuring SMTP. For incorrect configuration you will get error at the time of order place, new registration, sending newsletter.</p>
                            <h6 class="text-muted">For Non-SSL</h6>
                            <ul class="list-group" >
                                <li class="list-group-item text-white">Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver</li>
                                <li class="list-group-item text-white">Set Mail Host according to your server Mail Client Manual Settings</li>
                                <li class="list-group-item text-white">Set Mail port as 587</li>
                                <li class="list-group-item text-white">Set Mail Encryption as ssl if you face issue with tls</li>
                            </ul>
                            <br>
                            <h6 class="text-muted">For SSL</h6>

                            <ul class="list-group mar-no">
                                <li class="list-group-item text-white">Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver</li>
                                <li class="list-group-item text-white">Set Mail Host according to your server Mail Client Manual Settings</li>
                                <li class="list-group-item text-white">Set Mail port as 465</li>
                                <li class="list-group-item text-white">Set Mail Encryption as ssl</li>
                            </ul>
                        </div>

                    </div>
            </div>
        </div>
    </div>

</div>



@endsection
