@extends('admin.admin_master')

@section('main-content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="header-title">Total Users</h4>
                            <h6 class="total-user-nbr"><span class="badge badge-pill badge-danger"> {{ count($users) }} </span></h6>
                        </div>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>

                                    <th>CustomerId</th>
                                    <th>Profile Pic</th>
                                    <th>Name</th>
                                    <td>Email</td>
                                    <td>Mobile</td>
                                    <td>Status</td>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->customer_id }}</td>
                                        <td><img src="{{ (!empty($user->profile_photo_path))? url('upload/users_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 50px; height: 50px;"> </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>


                                        {{--  user online or offline Start --}}
                                        <td>
                                            @if($user->UserOnline())
                                            <span class="status">Active Now</span>
                                            @else
                                            <span class="status">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                            @endif
                                        </td>
                                        {{--  user online or offline end --}}

                                        <td>

                                            {{--  <a data-bs-toggle="modal" data-bs-target="#edit-all-users-modal" href="javascript:void(0);" class="action-icon edit-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href=" " class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>  --}}
                                            <a href="{{ route('role.all-users-show',[config('fortify.guard'),$user->id]) }}"class="btn btn-primary" title="View Data" id="view"><i class="fas fa-eye"></i></a>
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


        {{--  modal Edit   --}}
        <div class="edit-all-users-modal">
            <div class="modal fade" tabindex="-1" id="edit-all-users-modal">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit User Info</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="text" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input class="form-control" type="number" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Pic</label>
                            <input class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger waves-effect waves-light mb-2 me-2" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">Update</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- edit modal end -->

    </div> <!-- container -->
</div> <!-- content -->


@endsection
