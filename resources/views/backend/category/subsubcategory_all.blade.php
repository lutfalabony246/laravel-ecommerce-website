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
                                <h4 class="header-title"> Sub Sub Category List</h4>
                                <button data-bs-toggle="modal" data-bs-target="#add-category-modal" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2 me-2"><i class="fas fa-plus pe-2"></i>
                                    Add Sub Sub Category</button>
                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Sub Sub Category Name</th>
                                        <th>Sub Sub Category Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subsubcategory as $subsubcat)
                                        <tr>
                                            <td>{{ optional($subsubcat['category'])['category_name'] }}</td>
                                            <td>{{ optional($subsubcat['subcategory'])['sub_category_name'] }}</td>
                                            <td>{{ $subsubcat->subsubcategory_name }}</td>
                                            <td>
                                                <img src="{{ asset($subsubcat->subsubcategory_image) }}" alt="..."
                                                    height="100" width="100">
                                            </td>
                                            <td>
                                                <button type="button" value="{{ $subsubcat->id }}"
                                                    class="btn btn-warning editBtn btn-sm">
                                                    <i class="fa fa-pencil-alt"></i></button>
                                                <a href="{{ route('role.subsubcategory.delete', [config('fortify.guard'), $subsubcat->id]) }}"
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


    <!--Add Category modal-->
    <div class="add-category-modal">
        <div class="modal fade" tabindex="-1" id="add-category-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Sub Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="my-2">
                                    <label for="fname">Category Name</label>
                                    <select name="category_id" class="form-control">
                                        <option selected>Select a category</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="error_category_id" class="errorColor"></span>
                                </div>
                                <div class="my-2">
                                    <label for="fname">Sub Category Name</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control"
                                        aria-invalid="false">
                                        <option value="" selected="" disabled="">Select Sub Category </option>
                                        @foreach ($subcategorys as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="error_sub_category_id" class="errorColor"></span>
                                </div>
                                <div class="my-2">
                                    <label for="fname">Sub Sub Category Name</label>
                                    <input type="text" name="subsubcategory_name" class="form-control"
                                        placeholder="Sub Sub Category Name">
                                    <span id="error_sub_sub_category_name" class="errorColor"></span>
                                </div>
                                <div class="my-2">
                                    <label for="avatar">Sub Sub Category Image</label>
                                    <input type="file" name="subsubcategory_image" class="form-control">
                                    <span id="error_sub_sub_category_image" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_employee_btn" class="btn btn-info">Add SubSubCategory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="EditSubSubCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black"> Edit Sub Sub Category </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="UpdateSubSubCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit_subsubcategory_id">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="my-2">
                                <label for="fname">Category Name</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option selected>Select a category</option>
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="fname">Sub Category Name</label>
                                <select name="subcategory_id"  id="subcategoryy_id" class="form-control"
                                    aria-invalid="false">
                                    <option value="" selected="" disabled="">Select Sub Category </option>
                                    @foreach ($subcategorys as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="fname">Sub Sub Category Name</label>
                                <input type="text" name="subsubcategory_name" id="subsubcategory_name"
                                    class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="my-2">
                                <label for="avatar">Sub Category Image</label>
                                <input type="file" name="subsubcategory_image" id="subsubcategory_image"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update Sub Sub Category</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        //Add Submit
        $(document).on('submit', '#add_employee_form', function(e) {
            e.preventDefault();

            console.log("good");
            let formData = new FormData($('#add_employee_form')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('role.subsubcategory.store', config('fortify.guard')) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.status == 400) {
                        $('#error_category_id').text(response.errors.category_id);
                        $('#error_sub_category_id').text(response.errors.subcategory_id);
                        $('#error_sub_sub_category_name').text(response.errors
                            .subsubcategory_name);
                        $('#error_sub_sub_category_image').text(response.errors
                            .subsubcategory_image);

                    } else {
                        toastr.success(response.message);                       
                        location.reload();
                        $('#addEmployeeModal').modal('hide');
                    }
                }
            });
        });

        // edit employee ajax request
        $(document).on('click', '.editBtn', function(e) {
            console.log("okk");
            var cat_id = $(this).val();
            console.log(cat_id);
            $('#EditSubSubCategoryModal').modal('show');
            $.ajax({
                type: "GET",
                url: `/{{ config('fortify.guard') }}/subsubcategory/edit/${cat_id}`,
                success: function(response) {
                    $("#category_id").val(response.subsubcategory.category_id);
                    $("#subcategoryy_id").val(response.subsubcategory.subcategory_id);
                    $("#subsubcategory_name").val(response.subsubcategory.subsubcategory_name);
                    $("#edit_subsubcategory_id").val(cat_id);
                }
            });
        });
        // Update
        $(document).on('submit', '#UpdateSubSubCategoryForm', function(e) {
            e.preventDefault();
            var cat_id = $('#edit_subsubcategory_id').val();
            let EditFormData = new FormData($('#UpdateSubSubCategoryForm')[0]);
            // Axios Update
            axios.post(`/{{ config('fortify.guard') }}/subsubcategory/update/${cat_id}`, EditFormData)
                .then(response => {
                    console.log(response);
                    // location.reload();
                    $('#EditSubSubCategoryModal').modal('hide');
                    toastr.success(response.data.message);    
                })
        }); //update end
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: `/{{ config('fortify.guard') }}/subsubcategory/subcategory/ajax/${category_id}`,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .sub_category_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    </body>
@endsection
