
@extends('layouts.app')

@section('PageTitle', 'Home Banner')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home Banner</h1>
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
                        <form id="home_banner_form" action="{{route('home-banner-update')}}"
                              method="post"
                               enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{$data->id}}" name="id" hidden/>
                            <div class="form-group">
                                <label for="inputName">Title</label>
                                <input name="title" type="text" id="inputName" class="form-control"
                                       value="{{$data->title}}">
                                <small style="color: #e20000" class="error" id="title-error"></small>

                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Bio Description</label>
                                <textarea name="bio_description" id="inputDescription" class="form-control"
                                          rows="4">{{$data->bio_description}}</textarea>
                                <small style="color: #e20000" class="error" id="bio_description-error"></small>

                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Video URL</label><br>
                                <input name="video_url" type="text" id="inputName" class="form-control"
                                       value="{{$data->video_url}}">
                                <small style="color: #e20000" class="error" id="video_url-error"></small>

                            </div>
                            <div class="form-group">
                                <label for="banner_image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="banner_image" type="file" class="custom-file-input"
                                                id="banner_image" >
                                        <small style="color: #e20000" class="error" id="banner_image-error"></small>

                                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" style="max-width: 150px">
                                <small style="color: #e20000" class="error" id="image-error"></small>
                                <img id="show_image" class="img-fluid mb-3" src="{{ !empty($data->banner_image) ? url
                                ("uploads/images/home_banner/" . $data->banner_image):url
                                ("uploads/images/home_banner/about_no_img.png")
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
            $('#home_banner_form').on('submit', function(event){
                event.preventDefault();
                // remove errors if the conditions are true
                $('#home_banner_form *').filter(':input.is-invalid').each(function(){
                    this.classList.remove('is-invalid');
                });
                $('#home_banner_form *').filter('.error').each(function(){
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('home-banner-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        // remove errors if the conditions are true
                        $('#home_banner_form *').filter(':input.is-invalid').each(function(){
                            this.classList.remove('is-invalid');
                        });
                        $('#home_banner_form *').filter('.error').each(function(){
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
            $('#profile_image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_image').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#banner_image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_image').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
