@php
    use Illuminate\Support\Facades\Auth;
    $authData = Auth::user();
    $needsAjax = true;
@endphp
@extends('layouts.app')
@section('PageTitle', 'Profile')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Profile Information</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="profile-form" class="card-body" method="POST" action="{{ route('profile-update') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" class="form-control" id="name" value="{{$authData->name}}"/>
                <small style="color: #e20000" class="error" id="name-error"></small>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$authData->email}}"/>
                <small style="color: #e20000" class="error" id="email-name-error"></small>
            </div>
            <!-- /.card-body -->

            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="profile_image">
                        <label class="custom-file-label" for="profile_image">Choose image</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                <small style="color: #e20000" class="error" id="image-error"></small>
            </div>
            <div class="form-group" style="max-width: 150px">
                <img id="show_image" class="img-fluid mb-3" src="{{!empty($authData->image) ? url
                ('uploads/images/admin_profile/' .
                $authData->image) : url
                ('uploads/images/no_image.jpg')
                }}" alt="Photo" style="width:
                100%">
            </div>

            <div class="card-footer">
                <input form="profile-form" type="submit" class="btn btn-primary"/>
            </div>
        </form>
    </div>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Update Password</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form  class="card-body" id="change-password-form" action="{{route('password-update')}}"
              method="POST">
            @csrf
            <div class="form-group">
                <label for="old-pass">Current Password</label>
                <input  class="form-control" id="old-pass" name="old-password" type="password"/>
                <small style="color: #e20000" class="error" id="old-password-name-error"></small>
            </div>

            <div class="form-group">
                <label for="new-pass">New Password</label>
                <input  class="form-control" id="new-pass" name="new-password" type="password"/>
                <small style="color: #e20000" class="error" id="new-password-name-error"></small>
            </div>

            <div class="form-group">
                <label for="confirm-pass">Confirm Password</label>
                <input  class="form-control" id="confirm-pass" name="confirm-password" type="password"/>
                <small style="color: #e20000" class="error" id="confirm-password-name-error"></small>
            </div>

            <div >
                <input type="submit" class="btn btn-success" form="change-password-form" />
            </div>
        </form>
    </div>
@endsection

@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#profile-form').on('submit', function(event){
                event.preventDefault();
                // remove errors if the conditions are true
                $('#profile-form *').filter(':input.is-invalid').each(function(){
                    this.classList.remove('is-invalid');
                });
                $('#profile-form *').filter('.error').each(function(){
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('profile-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        // remove errors if the conditions are true
                        $('#profile-form *').filter(':input.is-invalid').each(function(){
                            this.classList.remove('is-invalid');
                        });
                        $('#profile-form *').filter('.error').each(function(){
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

            $('#change-password-form').on('submit', function(event){
                event.preventDefault();
                // remove errors if the conditions are true
                $('#change-password-form *').filter(':input.is-invalid').each(function(){
                    this.classList.remove('is-invalid');
                });
                $('#change-password-form *').filter('.error').each(function(){
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('password-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        // remove errors if the conditions are true
                        $('#change-password-form *').filter(':input.is-invalid').each(function(){
                            this.classList.remove('is-invalid');
                        });
                        $('#change-password-form *').filter('.error').each(function(){
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
@endsection


