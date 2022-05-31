@extends('admin.admin_master')

@section('main-content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid pt-5">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title pb-2">Create Permission</h4>
                            <form method="post" action="{{ route('role.admin.supplier.store', config('fortify.guard')) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="admin-input-container">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="user-name" class="form-label">Supplier Name</label>
                                                <div class="controls">
                                                    <Select class="form-control" name="type">
                                                        @foreach ($supplier as $emp)
                                                            <option value="{{ $emp->id }}">{{ $emp->supplyer_name }}
                                                            </option>
                                                        @endforeach
                                                    </Select>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="controls">
                                                    <input type="password" id="password" name="password"
                                                        class="form-control" placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                </div>

                                <div class="admin-access-container pt-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check mb-2 form-check-primary">
                                                <input type="checkbox" class="form-check-input rounded-circle"
                                                    id="checkbox_2" name="supplier_dashboard" value="1">
                                                <label class="form-check-label" for="customckeck1">Supplier Dashboard (All)</label>
                                            </div>

                                           

                                        </div>

                                    </div> <!-- end row-->
                                </div>
                                <button type="submit" class="admin-btn mt-3">Add Supplier</button>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
        </div> <!-- container -->

    </div> <!-- content -->
@endsection
