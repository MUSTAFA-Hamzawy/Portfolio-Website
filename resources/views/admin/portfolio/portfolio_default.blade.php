@extends('layouts.app')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('PageTitle', 'Portfolio')

@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Portfolio project list</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(count($data) > 0)
                <a href="{{route('portfolio-add')}}" class="btn btn-warning"><i class="fas fa-plus"></i>&nbsp;Add</a>

                <br/><br/>
                <table id="example1" class="table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Title</th>
                        <th>Category</th>
                        <th>Project Image</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $item)
                        <tr class="row-id-{{$item->Portfolio_id}}">
                            <td style="width: 20px">{{$loop->index + 1}}</td>
                            <td>{{$item->title}}</td>

                            <td>{{$item->category_name}}</td>
                            <td style="width: 150px">
                                    <img class="card-img img-fluid" src="{{url('uploads/images/portfolio/' .
                                    $item->image)
                                    }}" style="max-width: 100%"></td>
                            <td style="width: 150px">
                                <a title="Edit " href="{{route('portfolio-edit', $item->Portfolio_id)}}" class="btn bg-info mr-1">
                                    <i class="fas fa-edit"></i></a>

                                <button id="delete-button" title="Delete" class="btn bg-danger mr-1 delete-button"
                                         data-id="{{$item->Portfolio_id}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2>No data found, add some projects !</h2>
                <a href="{{route('portfolio-add')}}" class="btn btn-success"><i class="fas
                fa-plus"></i>&nbsp;
                    Add</a>
            @endif
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

@endsection

@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.delete-button').click( function(event){
                event.preventDefault();
                if(confirm('Are you sure ?'))
                {
                    let id = $(this).data('id');
                    $.ajax({
                        type: 'post',
                        url: '{{route('portfolio-remove')}}',
                        data:{
                            '_token': '{{csrf_token()}}',
                            'id' : id,
                        },
                        success : function(response)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: response.msg,
                                showDenyButton: false,
                                showCancelButton: false,
                            }).then((result) => {
                                $('.row-id-'+id).remove();
                            });
                        },
                        error: function(response) {
                        }
                    });
                }
            });
        });
    </script>
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{asset('backend/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>


@endsection
