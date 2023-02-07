
@extends('layouts.app')

@section('PageTitle', 'About')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About Info</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="about_form" action="{{route('about-update')}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{$data? $data->id : 0}}" name="id" hidden/>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" id="title" class="form-control"
                                       value="{{$data? $data->title : 0}}">
                                <small style="color: #e20000" class="error" id="title-error"></small>
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Sub Title</label>
                                <input name="sub_title" type="text" id="subtitle" class="form-control"
                                       value="{{$data->sub_title}}">
                                <small style="color: #e20000" class="error" id="sub_title-error"></small>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name="about_description" id="inputDescription" class="form-control"
                                          rows="4">{{$data->description}}</textarea>
                                <small style="color: #e20000" class="error" id="about_description-error"></small>

                            </div>
                            <div class="form-group">
                                <label for="about_image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="about_image" type="file" class="custom-file-input"
                                               id="about_image" >
                                        <small style="color: #e20000" class="error" id="about_image-error"></small>

                                        <label class="custom-file-label" for="about_image">Choose image</label>

                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" style="max-width: 150px">
                                <small style="color: #e20000" class="error" id="image-error"></small>
                                <img id="show_image" class="img-fluid mb-3" src="{{ !empty($data->about_image) ? url
                                ("uploads/images/about/" . $data->about_image):url
                                ("uploads/images/no_image.jpg")
                                }}" alt="Photo"
                                     style="width:100%">
                            </div>
                            <input type="submit" class="col-md-2 btn btn-block btn-outline-info" />
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection


@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#about_form').on('submit', function(event){
                event.preventDefault();
                // remove errors if the conditions are true
                $('#about_form *').filter(':input.is-invalid').each(function(){
                    this.classList.remove('is-invalid');
                });
                $('#about_form *').filter('.error').each(function(){
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('about-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        // remove errors if the conditions are true
                        $('#about_form *').filter(':input.is-invalid').each(function(){
                            this.classList.remove('is-invalid');
                        });
                        $('#about_form *').filter('.error').each(function(){
                            this.innerHTML = '';
                        });
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.reload();
                        });
                    },
                    error: function(response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err){
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key ).addClass('is-invalid');
                        });
                    }
                });
            });
        });

    </script>
@endsection

@section('js')
    <script type="text/javascript">

        $(document).ready(function(){
            $('#about_image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_image').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
