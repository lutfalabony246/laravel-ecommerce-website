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
                                    <h4 style="font-size: 24px;">Category List</h4>
                                    <button data-bs-toggle="modal" data-bs-target="#addCategoryModal" type="button"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2"><i
                                            class="fas fa-plus pe-2"></i> Add Category</button>
                                </div>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Category Icon</th>
                                            <th>Category Name</th>
                                            <th>Category Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $categories)
                                            <tr>
                                            <td>
                                                    <img src="{{ asset($categories->category_icon) }}" alt="..."
                                                        height="100" width="100">
                                                </td>
                                                <td>{{ $categories->category_name }}</td>
                                                <td>
                                                    <img src="{{ asset($categories->category_image) }}" alt="..."
                                                        height="100" width="100">
                                                </td>
                                                <td>
                                                    <button type="button" value="{{ $categories->id }}"
                                                        class="btn btn-warning editBtn btn-sm">
                                                        <i class="fa fa-pencil-alt"></i></button>
                                                    <a href="{{ route('role.category.delete', [config('fortify.guard'), $categories->id]) }}"
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
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_category_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Category Name</label>
                                <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                                <span id="error_name" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="avatar">category Image</label>
                            <input type="file" name="category_image" class="form-control">
                            <span id="error_image" class="errorColor"></span>
                        </div>
                        <div class="my-2">
                            <label for="avatar">category Icon</label>
                            <input type="file" name="category_icon" class="form-control">
                            <span id="error_icon" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_category_btn" class="btn btn-info">Add category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- EditBrandModal start --}}
    <div class="modal fade" id="EditCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black"> Update Category </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="UpdateCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <ul id="updateform_errList"></ul>
                        <input type="hidden" id="edit_category_id">
                        <div class="form-group">
                            <h5 style="color: black"> <span class="text-danger">*</span> Category Name</h5>
                            <div class="controls">
                                <input type="text" id="category_name" name="category_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5 style="color: black"> Category Image </h5>
                            <div class="controls">
                                <input type="file" id="category_image" name="category_image" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5 style="color: black"> Category Icon </h5>
                            <div class="controls">
                                <input type="file" id="category_icon" name="category_icon" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update Category</button>
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
            $(document).on('submit', '#add_category_form', function(e) {
                e.preventDefault();
                console.log("good");
                $('#error_name').text("");
                $('#error_image').text("");
                $('#error_icon').text("");
                let formData = new FormData($('#add_category_form')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('role.category.store', config('fortify.guard')) }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_name').text(response.errors.category_name);
                            $('#error_image').text(response.errors.category_image);
                            $('#error_icon').text(response.errors.category_icon);
                        } else {
                            // toastr.success(" {{ Session::get('message') }} ");
                            toastr.success(response.message);
                            location.reload();
                            $('#addCategoryModal').modal('hide');
                        }
                    }
                });
            });
            // Update
            $(document).on('submit', '#UpdateCategoryForm', function(e) {
                e.preventDefault();
                var cat_id = $('#edit_category_id').val();
                let EditFormData = new FormData($('#UpdateCategoryForm')[0]);
                // Axios Update
                axios.post(`/{{ config('fortify.guard') }}/category/update/${cat_id}`, EditFormData)
                    .then(response => {
                        console.log(response);
                       toastr.success(" {{ Session::get('message') }} ");
                        location.reload();
                        $('#EditCategoryModal').modal('hide');
                    })
            }); //update end
            // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                console.log("okk");
                var cat_id = $(this).val();
                console.log(cat_id);
                $('#EditCategoryModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: `/{{ config('fortify.guard') }}/category/edit/${cat_id}`,
                    success: function(response) {
                        console.log(response);
                        $('#category_name').val(response.category.category_name);
                        $('#edit_category_id').val(cat_id);
                    }
                })
            });
        });
    </script>
@endsection