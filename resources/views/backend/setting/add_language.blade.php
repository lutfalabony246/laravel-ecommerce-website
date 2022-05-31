






@extends('admin.admin_master')
@section('admin')


<div class="aiz-main-content za">
    <div class="px-15px px-lg-25px">
        <div class="row">
<div class="col-md-8" style="margin-left: 250px">
<div class="card mt-30 ml-20">
<div class="card-header">
    <h5 class="mb-0 h6">Add Language Information</h5>
</div>
<div class="card-body">
    <form class="form-horizontal" action="" method="POST">
        <input type="hidden" name="_token" value="gf3zFR8lSS0WGfalPojeBoB2RCfN4WsKXPwpMk01">   

        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_PORT">
            <div class="col-md-3">
                <label class="col-from-label">Name</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="MAIL_PORT" value="" placeholder="Name">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-3">
                <label class="col-from-label">Flag</label>
            </div>
            <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
            <div class="col-md-8">
                <select class="form-control demo-select2-placeholder" name="DEFAULT_LANGUAGE">
                <option value="#" selected="">BD</option>
                <option value="#">IR</option>
                <option value="#">AN</option>
              
             </select>
         </div>
</div>

        <div id="smtp">
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_HOST">
                <div class="col-md-3">
                    <label class="col-from-label">Lang Code</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Lang Code">
                </div>
            </div>

           
           
        </div>
        
        <div class="form-group mb-0 text-right">
            <button type="submit" class="btn btn-md btn-primary">Save</button>
        </div>
    </form>
</div>

</div>
</div>

</div>
</div>
    
</div>


@endsection
