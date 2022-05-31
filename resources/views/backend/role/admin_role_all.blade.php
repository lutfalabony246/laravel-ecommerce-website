@extends('admin.admin_master')
@section('main-content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <h4 class="text-center header-title">Total User</h4>
                        </div>
                        <div class="admin-btns">
                            <button class="employee-btn">
                                <a href="{{ route('role.emp.permision',config('fortify.guard')) }}">Employee permission</a>
                            </button>
                             <button class="employee-btn">
                                <a href="{{ route('role.sup.permision',config('fortify.guard')) }}">Suplier permission</a>
                            </button>
                            <button class="admin-btn">
                                <a href="{{ route('role.add.admin',config('fortify.guard')) }}">Add Admin</a>
                            </button>
                        </div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <td>Email</td>
                                    <td>Access</td>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adminuser as $item)
                                        <tr>
                                            <td> <img src="{{ asset($item->profile_photo_path) }}" style="width: 50px; height: 50px;">  </td>
                                            <td> {{ $item->name }}  </td>
                                            <td> {{ $item->email  }}  </td>
                                            <td>
                                                @if($item->brand == 1)
                                                <span class="badge btn-primary">Brand</span>
                                                @else
                                                @endif
                                                @if($item->category == 1)
                                                <span class="badge btn-secondary">Category</span>
                                                @else
                                                @endif
                                                @if($item->product == 1)
                                                <span class="badge btn-success">Product</span>
                                                @else
                                                @endif
                                                @if($item->slider == 1)
                                                <span class="badge btn-danger">Slider</span>
                                                @else
                                                @endif
                                                @if($item->cupons == 1)
                                                <span class="badge btn-warning">Cupons</span>
                                                @else
                                                @endif
                                                @if($item->shipping == 1)
                                                <span class="badge btn-info">Shipping</span>
                                                @else
                                                @endif
                                                @if($item->setting == 1)
                                                <span class="badge btn-dark">Setting</span>
                                                @else
                                                @endif
                                                @if($item->returnorder == 1)
                                                <span class="badge btn-primary">Return Order</span>
                                                @else
                                                @endif
                                                @if($item->review == 1)
                                                <span class="badge btn-secondary">Review</span>
                                                @else
                                                @endif
                                                @if($item->pos == 1)
                                                <span class="badge btn-primary">POS</span>
                                                @else
                                                @endif
                                                @if($item->orders == 1)
                                                <span class="badge btn-success">Orders</span>
                                                @else
                                                @endif
                                                @if($item->stock == 1)
                                                <span class="badge btn-danger">Stock</span>
                                                @else
                                                @endif
                                                @if($item->reports == 1)
                                                <span class="badge btn-warning">Reports</span>
                                                @else
                                                @endif
                                                @if($item->alluser == 1)
                                                <span class="badge btn-info">Alluser</span>
                                                @else
                                                @endif
                                                @if($item->adminuserrole == 1)
                                                <span class="badge btn-dark">Adminuserrole</span>
                                                @else
                                                @endif
                                            </td>
                                            <td width="25%">
                                                <a href="{{ route('role.edit.admin.user',[config('fortify.guard'),$item->id]) }}" class="action-icon edit-icon" title="Edit Data"><i class="mdi mdi-square-edit-outline mt-5"></i> </a>
                                                <a href="{{ route('role.delete.admin.user',[config('fortify.guard'),$item->id])}}" class="action-icon delete-icon" title="Delete"><i class="far fa-trash-alt"></i> </a>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
</div> <!-- content -->
@endsection