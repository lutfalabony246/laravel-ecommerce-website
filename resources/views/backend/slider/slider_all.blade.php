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
                                <h4 class="header-title">Slider List</h4>
                                <button data-bs-toggle="modal" data-bs-target="#add-slider-modal" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2 me-2" id="addSliderbtn"><i
                                        class="fas fa-plus pe-2"></i>
                                    Add Slider</button>
                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr id="sid">
                                        <th>SN</th>
                                        <th>Slider Image</th>
                                        <th>Slider Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody id="tBody">


                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->
    </div>

    <!--Add slider modal-->
    <div class="add-slider-modal">
        <div class="modal fade" tabindex="-1" id="add-slider-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="AddSliderForm">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Slider Title</label>
                                {{-- <input class="form-control" type="text" id="title"> --}}
                                <div class="controls">
                                    <input type="text" id="title" name="title" class="form-control">
                                    <span id="error_name" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" id="description" name="description" class="form-control">
                                <span id="error_desc" style="color:red;"></span>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">**Slider Image</label>
                                <input type="file" id="slider_img" name="slider_img" class="form-control">
                                <span id="error_img" style="color:red;"></span>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect waves-light mb-2 me-2"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submitData" class="btn btn-info waves-effect waves-light mb-2 me-2">Add
                            Slider</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Add slider modal-->
    <div class="add-slider-modal">
        <div class="modal fade" tabindex="-1" id="editSlider">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateSliderForm">
                            @csrf
                             <input type="hidden" id="slider_id">
                            <div class="mb-3">
                                <label for="title" class="form-label">Slider Title</label>
                                {{-- <input class="form-control" type="text" id="title"> --}}
                                <div class="controls">
                                  <input type="text" id="update_title" name="title" class="form-control">
                                <span id="error_name" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                 <input type="text" id="update_description" name="description" class="form-control">
                                <span id="error_desc" style="color:red;"></span>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Slider Image  <span>size: 933X236px</span></label>
                                <input type="file" id="update_slider_img" name="slider_img" class="form-control">
                                <span id="error_img" style="color:red;"></span>
                              
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect waves-light mb-2 me-2"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="updateSlider" class="btn btn-info">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="editSlider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: white">
                <div class="modal-header modal-dialog-centered">
                    <h5 class="modal-title">Slider Update</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close"><i
                            class="far fa-window-close"></i></button>
                </div>
                <div class="modal-body">

                    <form id="updateSliderForm">
                        @csrf

                        <input type="hidden" id="slider_id">

                        <div class="form-group">
                            <h5>Slider Title <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="update_title" name="title" class="form-control">
                                <span id="error_name" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Slider Description <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="update_description" name="description" class="form-control">
                                <span id="error_desc" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5> Slider Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" id="update_slider_img" name="slider_img" class="form-control">
                                <span id="error_img" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                data-dismiss="modal">Close</button>
                            <button type="submit" id="updateSlider" class="btn btn-info">Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div> --}}
@endsection
@section('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        var myModal = new bootstrap.Modal(document.getElementById('add-slider-modal'));

        document.getElementById('addSliderbtn').addEventListener('click', () => {
            myModal.show();
        });

        document.getElementById('submitData').addEventListener('click', () => {

        });
    </script>

    <script>
        var editModal = new bootstrap.Modal(document.getElementById('editSlider'));

        function openModal() {
            editModal.show();
        }
    </script>
    {{-- //For add data --}}
    <script>
        $(document).ready(function() {
            showdata();

            $("#submitData").click(function(e) {
                e.preventDefault();

                // let AddForm = document.querySelector('#AddSliderForm');
                var form = $('#AddSliderForm')[0];
                var formData = new FormData(form);
                // var slider = new FormData(AddForm);
                console.log(formData);
       
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/{{ config('fortify.guard') }}/slider/store',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.status == 400) {
                            $('#error_name').text(data.errors.title);
                            $('#error_desc').text(data.errors.description);
                            $('#error_img').text(data.errors.slider_img);

                        } else {
                            toastr.success(data.message);
                            location.reload();
                            showdata();
                            $('#add-slider-modal').hide();
                            AddForm.reset();
                        }
                    }
                    // success: function(data) {
                    //     console.log(data);
                    //     toastr.success(data.message);
                    //     showdata();
                    //     myModal.hide();
                    //     AddForm.reset();
                    // }
                });
            });
            //For show data

            function showdata() {
                $.ajax({
                    type: "GET",
                    url: `/{{ config('fortify.guard') }}/slider/slidersdata`,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        var a = 1;
                        $('#tBody').html("");
                        $.each(response.data, function(key, data) {

                            var s = `
                            <tr>
                            <td>${a++}</td>
                            <td><img src="/${data.slider_img}" height="100" width="150"></td>
                            <td>${data.title}</td>
                            <td>${data.description}</td>
                            `;

                            var check;
                            if (data.status == 1) {
                                check =
                                    "<td><span class='badge bg-success'>Active</span></td>";

                            } else {
                                check =
                                    "<td><span class='badge bg-danger'>Deactive</span></td>";
                            }
                            s += check;
                            var statuschange;
                            if (data.status == 1) {
                                statuschange = `
                               <td>
                               <a href="/{{ config('fortify.guard') }}/slider/deactive/${data.id}" data-value="${data.id}" class="btn btn-danger"><i class="fas fa-long-arrow-alt-up"></i></a>
                               <a type="submit" href="/{{ config('fortify.guard') }}/slider/edit/${data.id}"  data-value="${data.id}" class="btn btn-success" onclick="openModal()" id="edit_modal_show" data-toggle="modal"><i class="fas fa-edit"></i></a>
                               <a type="submit" href="/{{ config('fortify.guard') }}/slider/delete/${data.id}" data-value="${data.id}" class="btn btn-danger" id="delete_slider" ><i class="fas fa-trash"></i></a>

                               </td>
                               `
                            } else {
                                statuschange = `
                                <td>
                                <a href="/{{ config('fortify.guard') }}/slider/active/${data.id}" data-value="${data.id}" class="btn btn-success"><i class="fas fa-long-arrow-alt-down"></i></a>

                                <a type="submit" href="/{{ config('fortify.guard') }}/slider/edit/${data.id}"  data-value="${data.id}" class="btn btn-success" onclick="openModal()" id="edit_modal_show" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                <a type="submit" href="/{{ config('fortify.guard') }}/slider/delete/${data.id}" data-value="${data.id}" class="btn btn-danger" id="delete_slider" ><i class="fas fa-trash"></i></a>
                                </td>
                                    `
                            }
                            s += statuschange;
                            `
                        </tr>
                            `;
                            $('#tBody').append(s);

                        });
                    }
                });
            };

            $(document).on('click', '#edit_modal_show', function(e) {
                e.preventDefault();
                var id = $(this).data('value');
                $('#slider_id').val(id);
                $.ajax({
                    type: "GET",
                    url: `/{{ config('fortify.guard') }}/slider/edit/${id}`,
                    success: function(response) {
                        console.log(response);
                        $('#update_title').val(response.title);
                        $('#update_description').val(response.description);
                        $('#update_slider_img').val(response.slider_img);
                    }
                });
                $('.btn-close').find('input').val('');
            });

            $("#updateSlider").click(function(e) {
                e.preventDefault();

                var id = $('#slider_id').val();
                let UpdateForm = document.querySelector('#updateSliderForm');
                var data = new FormData(UpdateForm);
                axios.post(`/{{ config('fortify.guard') }}/slider/update/${id}`, data)
                    .then(response => {
                        showdata();
                        editModal.hide();
                        toastr.success(response.message);
                        // toastr.success(" {{ Session::get('message') }} ");
                        UpdateForm.reset();
                    })
                    .catch(error => {
                        console.log(error)
                    })
            });

            $(document).on('click', '#delete_slider', function(e) {
                e.preventDefault();


                var id = $(this).data('value');
                var url = `/{{ config('fortify.guard') }}/slider/delete/${id}`;



                Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            axios.post(url)

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    }).then(response => {
                        showdata();
                    })
                    .catch(error => {

                    })
            });



        })


        //For get the data
    </script>
@endsection
