
@extends('admin.admin_master')
@section('admin')



<div class="aiz-main-content" style="margin:20px">
    <div class="px-15px px-lg-25px">
        
<div class="aiz-titlebar text-left mt-2 mb-3">
<div class="row align-items-center">
<div class="col-md-4">
<h1 class="h3">All Shipping Zones</h1>
</div>
<div class="col-md-8 text-md-right">
<a href="{{ route("shipping_zone.information_view") }}" class="btn btn-primary">
    <span>Add New Zone</span>
</a>
</div>
</div>
</div>

<div class="card">
<div class="card-body">
<table class="table aiz-table mb-0 footable footable-1 breakpoint-xl" style="">
<thead>
    <tr class="footable-header">

    <th class="footable-first-visible" style="display: table-cell;">SI</th>
    <th style="display: table-cell;">Name</th>
    <th style="display: table-cell;">Cities</th>
    <th style="display: table-cell;">Standard Delivery Cost</th>
    <th style="display: table-cell;">Express Delivery Cost</th>
    <th data-breakpoints="md" class="footable-last-visible" style="display: table-cell;">Options</th>
</tr>
</thead>

<tbody>
                        

    <tbody>
    
                          
        <tr>
            <td style="color:#8a99b5;">1</td>
           <td style="color: #8a99b5;">New York</td>
           <td style="color: #8a99b5;">Alabaster</td>
           <td style="color: #8a99b5;">2.00€</td>
           <td style="color: #8a99b5;">5.00€	</td>
          
           <td>                 
            <button class="btn btn-success btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
            <button class="btn btn-danger btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
          </td>
                  
        </tr>


        <tr>
            <td style="color: #8a99b5;">2</td>
           <td style="color: #8a99b5;">Los Angeles</td>
           <td style="color: #8a99b5;">Albertville	</td>
           <td style="color: #8a99b5;">1.00€</td>
           <td style="color: #8a99b5;">3.00€	</td>
          
           <td>                 
            <button class="btn btn-success btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
            <button class="btn btn-danger btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
          </td>
                  
        </tr>



        <tr>
            <td style="color: #8a99b5;">3</td>
           <td style="color: #8a99b5;">Chicago	</td>
           <td style="color: #8a99b5;">Alexander City</td>
           <td style="color: #8a99b5;">2.00€</td>
           <td style="color: #8a99b5;">5.00€	</td>
          
           <td>                 
            <button class="btn btn-success btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
            <button class="btn btn-danger btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
          </td>
                  
        </tr>

       
     </tbody>



        
        </tbody>
</table>

<div class="aiz-pagination">

</div>

</div>
</div>

    </div>
   
</div>

@endsection
