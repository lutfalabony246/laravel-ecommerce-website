@extends('admin.admin_master')

@section('main-content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-9 m-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pt-3 ps-3 header-title">Department List</div>
                        </div>
                        <div class="col-lg-6">
                            <div class="modal-header">
                                <div class="addbtn">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#linkEditorModal" data-bs-whatever="@mdo">Department</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="pt-3 ps-3 header-title">Department List</div>  --}}

                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Department Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $serial=1;
                                @endphp

                                @foreach ($departments as $department)
                                <tr>
                                    <td>  {{$serial++}}</td>
                                    {{--  <td>{{ $department->id }}</td>  --}}
                                    <td>{{ $department->department_name }}</td>
                                    <td width="35%">

                                        <a href="#"class="btn btn-warning edit" data-id="{{ $department->id }}"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('department.edit', $department->id ) }}"class="btn btn-primary edit" data-id="{{ $book->id }}">Edit</a> --}}


                                        <a href="{{ route('role.department.delete', [config("fortify.guard"),$department->id ]) }}" class=" btn btn-danger " id="deleteCompany" data-id="{{ $department->id }}" ><i class="fas fa-trash"></i></a>
                                        {{-- <a href="{{ route('department.delete', $department->id ) }}" id="#" class=" btn btn-dangerdeleteRecord" data-id="{{ $department->id }}" >Delete</a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div><!-- end card -->
            </div><!-- end col-->

        </div>
        <!-- end row-->

        {{--  modal for add  --}}
        <div class="modal fade" id="linkEditorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="modalFormData" name="modalFormData" class="form-horizontal">
                        <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Department Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="department_name" name="department_name"
                                            placeholder="Enter department name" value="">
                                            <span id="department_name_error" class="text-danger"></span>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close </button>
                            <button type="submit" class="btn btn-success" id="btn-save" value="add"> Add </button>
                        </div>
                    </form>
                </div>

            </div>
            </div>
        </div>

        {{--  modal for edit  --}}
        <div class="modal fade" id="ajax_department_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  name="addEditDepartmentForm" id="addEditDepartmentForm" class="form-horizontal" method="POST">
                        <div class="modal-body">
                                @csrf
                                <input type="hidden" name="id" id="department_id">
                                <div class="form-group">
                                    <label for="name" class="form-label">Department Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="department_name_edit" name="department_name" value="" maxlength="50" required="">
                                    </div
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close </button>
                            <button type="submit" class="btn btn-success" id="btnn-save" value="addNewBook">Update </button>
                        </div>
                    </form>
                </div>

            </div>
            </div>
        </div>
    </div> <!-- container -->
</div>

@endsection

@section('css')
    <style>
        .addbtn{
            margin-left: 27rem;
        }
    </style>
@endsection


@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function(){
        ////----- Open the modal to CREATE a link -----////
            jQuery('#btn-add').click(function () {
                jQuery('#linkEditorModal').modal('show');
            });

            $("#modalFormData").submit(function(e) {
                //console.log("this is running")
                e.preventDefault();
                const formdata = new FormData($('#modalFormData')[0]);
                axios.post('/{{ config('fortify.guard') }}/department/store',formdata)
                    .then(response=>{
                        jQuery('#linkEditorModal').modal('hide');
                        $("#success").html(response.message)

                            Swal.fire(
                            'success!',
                            'Department Add successfully!',
                            'success'
                        )
                        window.location.reload();
                    }).catch(error=>{
                        console.log(error)
                        if(error?.response?.status  === 422){
                            $("#department_name_error").text(error.response.data.errors.department_name[0])
                        }
                    })
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
            // ajax
            $.ajax({
                type:"POST",
                //url: "{{ url('department/edit') }}",
                url: `/{{ config('fortify.guard') }}/department/edit`,
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    console.log(res)
                    // $('#ajaxDepartmentModel').html("Edit Book");
                    // jQuery('#linkEditorModal').modal('hide');
                    $('#ajax_department_model').modal('show');
                    //  jQuery('#ajax_department_model').modal('show');
                    $('#department_id').val(res.id);
                    $('#department_name_edit').val(res.department_name);
                }
            });
        });

        $('#addEditDepartmentForm').on('submit', function (event) {
            event.preventDefault();
                var id = $("#department_id").val();
                var department_name = $("#department_name_edit").val();
                $("#btnn-save").html('Please Wait...');
                $("#btnn-save"). attr("disabled", true);
                const formData = new FormData(event.target);
            $.ajax({
                    type:"POST",
                    /*url: "{{ url('department/update') }}",*/
                    url: `/{{ config('fortify.guard') }}/department/update`,
                   /*// url: `/{{ config('fortify.guard') }}/brandnew/edit/${brand_id}`,*/
                    data: {
                    id:id,
                    department_name:department_name,

                    },
                success: function(res){
                   $("#success").html(res.message)

                        Swal.fire(
                        'success!',
                        'Department update successfully!',
                        'success'
                        )
                        window.location.reload();
                },
                error(err){
                    $("#btnn-save").html('Submit');
                    $("#btnn-save"). attr("disabled", false);
                }
            });
        });
    });
 </script>

 <script>
    $(document).ready(function () {
        $("body").on("click","#deleteCompany",function(e){

        if(!confirm("Do you really want to do this?")) {
            return false;
            }
        e.preventDefault();
        var id = $(this).data("id");
        console.log(id)
        // var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
        console.log(token)
        var url = e.target;

        $.ajax(
            {

                url: `/{{ config('fortify.guard') }}/department/delete/${id}`, //or you can use url: "company/"+id,
                type: 'DELETE',
                data: {
                _token: token,
                    id:id
            },
            success: function (response){

                $("#success").html(response.message)
                Swal.fire(
                    'Remind!',
                    'Department deleted successfully!',
                    'warning'
                )
                window.location.reload()
            }
            });
            return false;
        });
    });
</script>
@endsection
