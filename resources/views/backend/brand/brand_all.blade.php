@extends('admin.admin_master')
@section('main-content')
 
    <!-- Begin page -->
    <div id="wrapper">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="add-brand-container d-flex justify-content-between mb-2">
                                    <h4 style="font-size: 24px;">Brand List</h4>
                                    <button data-bs-toggle="modal" data-bs-target="#add-brand-modal" type="button"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2"><i
                                            class="fas fa-plus pe-2"></i> Add Brand</button>
                                </div>

                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Brand Name</th>
                                            <th>Brand Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->brand_name_cats_eye }}</td>
                                                <td>
                                                    <img src="{{ asset($brand->brand_image) }}" alt="..." height="100"
                                                        width="100">
                                                </td>
                                                <td>
                                                    <button type="button" value="{{ $brand->id }}"
                                                        class="btn btn-success editBtn btn-sm">
                                                        <i class="fa fa-pencil-alt"></i></button>
                                                    <a href="{{ route('role.brandnew.delete', [config('fortify.guard'), $brand->id]) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fa fa-trash"></i></a>
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
    </div>
    <!-- END wrapper -->
    <!--Add brand modal-->
    <div class="add-brand-modal">
        <div class="modal fade" tabindex="-1" id="add-brand-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="AddBrandForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <h5 style="color: black"> <span class="text-danger">*</span>Brand Name </h5>
                                <div class="controls">
                                    <input type="text" id="brand_name_cats_eye" name="brand_name_cats_eye"
                                        placeholder="Brand Name" class="form-control">
                                    <span id="error_name" class="errorColor"></span>

                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <h5 style="color: black"> Brand Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" id="brand_image" name="brand_image" class="form-control">
                                    <span id="error_image" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary waves-effect waves-light mb-2 me-2"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info waves-effect waves-light mb-2 me-2"> Add
                                Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- EditBrandModal start --}}
    <div class="modal fade" id="EditBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black"> Update Brand </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="UpdateBrandForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <ul id="updateform_errList"></ul>
                        <input type="hidden" id="edit_brand_id">
                        <div class="form-group">
                            <h5 style="color: black"> <span class="text-danger">*</span> Cats Eye Brand</h5>
                            <div class="controls">
                                <input type="text" id="cat" name="brand_name_cats_eye" placeholder="Brand Name"
                                    class="form-control">
                                <span id="error_image" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5 style="color: black"> Brand Image </h5>
                            <div class="controls">
                                <input type="file" id="category_image" name="brand_image" class="form-control">
                                <span id="error_image" class="errorColor"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- EditBrandModal end --}}
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        console.log("pll0");
        let example1 = null;
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //Add Submit
            $(document).on('submit', '#AddBrandForm', function(e) {
                e.preventDefault();

                console.log("good");
                let formData = new FormData($('#AddBrandForm')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('role.brandnew.store', config('fortify.guard')) }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_name').text(response.errors.brand_name_cats_eye);
                            $('#error_image').text(response.errors.brand_image);

                        } else {
                            toastr.success(response.message);
                            location.reload();
                            $('#add-brand-modal').modal('hide');
                        }
                    }

                });
            });
            $(document).on('submit', '#UpdateBrandForm', function(e) {
                e.preventDefault();
                var brand_id = $('#edit_brand_id').val();
                let EditFormData = new FormData($('#UpdateBrandForm')[0]);    
                // Axios Update
                axios.post(`/{{ config('fortify.guard') }}/brandnew/update/${brand_id}`, EditFormData)
                    .then(response => {
                        if (response.status == 400) {
                            $('#error_name').text(response.errors.brand_name_cats_eye);
                            $('#error_image').text(response.errors.brand_image);

                        } else {
                            toastr.success(" {{ Session::get('message') }} ");
                            location.reload();
                            $('#EditBrandModal').modal('hide');
                        }
                    })
            }); //update end
            // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                console.log("okk");
                var brand_id = $(this).val();
                $('#EditBrandModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: `/{{ config('fortify.guard') }}/brandnew/edit/${brand_id}`,
                    success: function(response) {
                        console.log(response);
                        $('#cat').val(response.brand.brand_name_cats_eye);
                        $('#edit_brand_id').val(brand_id);
                    }
                    // }
                })
            });
        });
    </script>

@endsection
