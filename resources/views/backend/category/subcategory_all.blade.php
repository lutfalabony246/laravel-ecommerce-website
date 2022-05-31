@extends('admin.admin_master')

@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h4 class="header-title"> Sub Category List</h4>
                                <button data-bs-toggle="modal" data-bs-target="#add-subcategory-modal" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2 me-2"><i class="fas fa-plus pe-2"></i>
                                    Add Sub Category</button>
                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <td>Sub Category Name</td>
                                        <th>Sub Category Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategory as $subcat)
                                        <tr>
                                            {{-- <td>{{ $subcat['category']['id'] }}</td> --}}
                                            <td>
                                            {{ optional($subcat['category'])['category_name'] }}
                                            </td>
                                            <td>{{ $subcat->sub_category_name }}</td>
                                            <td>
                                                <img src="{{ asset($subcat->subcategory_image) }}" alt="..." height="100"
                                                    width="100">
                                            </td>

                                            <td>
                                                <button type="button" value="{{ $subcat->id }}"
                                                    class="btn btn-warning editBtn btn-sm">
                                                    <i class="fa fa-pencil-alt"></i></button>
                                                <a href="{{ route('role.subcategory.delete', [config('fortify.guard'), $subcat->id]) }}"
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



        <!--Add sub Category modal-->
        <div class="add-subcategory-modal">
            <div class="modal fade" tabindex="-1" id="add-subcategory-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Sub Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="#" method="POST" id="add_subcategory_form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body p-4 bg-light">
                                <div class="row">
                                    <div class="col-lg">
                                        <label> Category Name</label>
                                        <select name="category_id" class="form-control">
                                            <option selected>Select a category</option>
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span id="error_category_id" class="errorColor"></span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="fname">Sub Category Name</label>
                                        <input type="text" name="sub_category_name" class="form-control"
                                            placeholder="Sub Category Name">
                                        <span id="error_name" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label for="avatar">Sub Category Image</label>
                                    <input type="file" name="subcategory_image" class="form-control">
                                    <span id="error_image" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="add_subcategory_btn" class="btn btn-info">Add sub
                                    category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- content -->
    </div>
    <!-- END wrapper -->


    <div class="modal fade" id="EditSubCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black"> Edit SubCategory </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="UpdateSubCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <ul id="updateform_errList"></ul>
                        <input type="hidden" id="edit_subcategory_id">
                        <label style="color: black"> Category Name</label>
                        <select id="category_id" class="form-control" name="category_id">
                            <option selected>Select a category</option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <h5 style="color: black"> <span class="text-danger">*</span>Sub Category Name</h5>
                            <div class="controls">
                                <input type="text" id="sub_category_name" name="sub_category_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5 style="color: black"> Sub Category Image </h5>
                            <div class="controls">
                                <input type="file" id="subcategory_image" name="subcategory_image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update Sub Category</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let example1 = null;
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //Add Submit
            $(document).on('submit', '#add_subcategory_form', function(e) {
                e.preventDefault();

                console.log("good");
                let formData = new FormData($('#add_subcategory_form')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('role.subcategory.store', config('fortify.guard')) }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // toastr.success(" {{ Session::get('message') }} ");
                        // toastr.success(response.message);
                        // location.reload();
                        // $('#add-subcategory-modal').modal('hide');
                        if (response.status == 400) {
                            $('#error_category_id').text(response.errors.category_id);
                            $('#error_name').text(response.errors.sub_category_name);
                            $('#error_image').text(response.errors.subcategory_image);

                        } else {
                            toastr.success(" {{ Session::get('message') }} ");
                            location.reload();
                            $('#add-subcategory-modal').modal('hide');

                        }

                    }
                });
            });
            // Update
            $(document).on('submit', '#UpdateSubCategoryForm', function(e) {
                e.preventDefault();
                var cat_id = $('#edit_subcategory_id').val();
                let EditFormData = new FormData($('#UpdateSubCategoryForm')[0]);
                // Axios Update
                axios.post(`/{{ config('fortify.guard') }}/subcategory/update/${cat_id}`, EditFormData)
                    .then(response => {
                        console.log(response);
                        toastr.success(response.message);
                        location.reload();
                        $('#EditSubCategoryModal').modal('hide');
                    })
            }); //update end

            // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                console.log("okk");
                var cat_id = $(this).val();
                console.log(cat_id);
                $('#EditSubCategoryModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: `/{{ config('fortify.guard') }}/subcategory/edit/${cat_id}`,
                    success: function(response) {
                        console.log(response);
                        $('#category_id').val(response.subcategory.category_id);
                        $('#sub_category_name').val(response.subcategory.sub_category_name);
                        //      $("#subcategory_image").html(
                        //   `<img src="storage/upload/subcategory/${response.subcategory_image}" width="100" class="img-fluid img-thumbnail">`);
                        // $('#category_id').val(response.subcategory.category_id);
                        $('#edit_subcategory_id').val(cat_id);
                    }
                })
            });
        });
    </script>
@endsection
