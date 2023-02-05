@extends('admin.index')
@section('content')
    @section('title', 'Profile')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-3">
                        <img class="card-img img-fluid" src="{{asset('backend')}}/assets/images/small/img-3.jpg"
                             alt="Card image">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h4 style="margin-bottom: 15px">Name : <span style="font-weight:
                            normal">{{$authenticatedData->name}}</span> </h4>
                            <h4 class="mb-6" style="margin-bottom: 15px">Email : <span style="font-weight:
                            normal">{{$authenticatedData->email}}</span> </h4>
                            <h4 class="mb-6" style="margin-bottom: 15px">Joined Date : <span style="font-weight:
                            normal">{{$authenticatedData->created_at}}</span>
                            </h4>
                            <input  class="btn btn-warning col-md-2" value="Edit Profile">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
