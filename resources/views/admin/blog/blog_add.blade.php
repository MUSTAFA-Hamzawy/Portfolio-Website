
@extends('layouts.app')

@section('PageTitle', 'Add blog post')

@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('backend/assets')}}/plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{asset('backend/assets')}}/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="{{asset('backend/assets')}}/plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{asset('backend/assets')}}/plugins/simplemde/simplemde.min.css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add blog post</h1>
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
                        <form id="blog_form" action="{{route('blog-create')}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="post_title">Post Title</label>
                                <input name="post_title" type="text" id="post_title" class="form-control"
                                >
                                <small style="color: #e20000" class="error" id="post_title-error"></small>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id  }}">{{ $category->name  }}</option>
                                    @endforeach
                                </select>
                                <small style="color: #e20000" class="error" id="category-error"></small>
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name="post_description" class="form-control"
                                          rows="4" id="summernote" style="display: none;"></textarea>
                                <small style="color: #e20000" class="error" id="post_description-error"></small>
                            </div>

                            <div class="form-group">
                                <label for="image">Project Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input"
                                               id="image" >
                                        <small style="color: #e20000" class="error" id="image-error"></small>

                                        <label class="custom-file-label" for="image">Choose image</label>

                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" style="max-width: 150px">
                                <small style="color: #e20000" class="error" id="image-error"></small>
                                <img id="show_image" class="img-fluid mb-3"
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
            $('#blog_form').on('submit', function(event){
                event.preventDefault();
                // remove errors if the conditions are true
                $('#blog_form *').filter(':input.is-invalid').each(function(){
                    this.classList.remove('is-invalid');
                });
                $('#blog_form *').filter('.error').each(function(){
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('blog-create')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        // remove errors if the conditions are true
                        $('#blog_form *').filter(':input.is-invalid').each(function(){
                            this.classList.remove('is-invalid');
                        });
                        $('#blog_form *').filter('.error').each(function(){
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
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_image').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <!-- Summernote -->
    <script src="{{asset('backend/assets')}}/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

        })
    </script>
@endsection
