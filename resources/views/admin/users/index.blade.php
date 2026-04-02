@extends('admin.app')
@section('title')
    User
@endsection

@push('custom-style')
   {{-- Datatable css  --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
    {{-- Data Table --}}
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">User</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('user.create')}}" class="add-new">Create User<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone No</th>
                                    <th scope="col">Show in home</th>
                                    <th scope="col">Activation</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>



    {{-- Datatable Ajax Call --}}
    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/users';
        var statusUrl = SITEURL + '/dashboard/users/change/status';
        var showHomeUrl = SITEURL + '/dashboard/users/show/home';

        $(document).ready( function () {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'designation', name: 'designation', orderable: true },
                    { data: 'email', name: 'email', orderable: true },
                    { data: 'phone_no', name: 'phone_no', orderable: true },
                    {
                        data: 'show-home-btn',
                        orderable: false,
                        render: function (data) {
                            var name;
                            if(data.status == 1) {
                                name = '<i class="ri-checkbox-circle-line" style="color: #009688;"></i>';
                            } else {
                                name = '<i class="ri-close-circle-line" style="color: #dd3546;"></i>';
                            }
                            return '<div id="show-home-' + data.id + '" style="font-size: 20px;text-align: center;cursor: pointer" class="show-home-change" data-id="' + data.id + '" data-status="' + data.status + '" alt="acive or inactive">' + name + '</div>';
                        }
                    },
                    {
                        data: 'active-btn',
                        orderable: false,
                        render: function (data) {
                            var name;
                            if(data.status == 1) {
                                name = '<i class="ri-checkbox-circle-line" style="color: #009688;"></i>';
                            } else {
                                name = '<i class="ri-close-circle-line" style="color: #dd3546;"></i>';
                            }
                            return '<div id="status-' + data.id + '" style="font-size: 20px;text-align: center;cursor: pointer" class="status-change" data-id="' + data.id + '" data-status="' + data.status + '" alt="acive or inactive">' + name + '</div>';
                        }
                    },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/user/edit/' + data + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion(\'' + SITEURL + '/dashboard/user/delete/' + data + '\')"><i class="ri-delete-bin-2-line"></i></a>';
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'asc']]
            });
        });

        $('body').on('click', '.status-change', function () {
            var id = $(this).data('id');
            var status = $(this).data('status');
            console.log(id, status);
            $('#status-' + id).html('<i class="ri-handbag-line"></i>');
            var value, name;
            if(status == 1) {
                value = 0;
                name = '<i class="ri-close-circle-line" style="color: #dd3546;"></i>';
            } else {
                value = 1;
                name = '<i class="ri-checkbox-circle-line" style="color: #009688;"></i>';
            }
            $.ajax({
                type: "GET",
                dataType: "json",
                url: statusUrl,
                data: {'status': value, 'id': id},
                success: function(data) {
                    $('#status-' + id).html(name);
                    $('#status-' + id).attr('data-status', value);
                    $('#data-table').DataTable().ajax.reload();
                }
            });
        });
        $('body').on('click', '.show-home-change', function () {
            var id = $(this).data('id');
            var status = $(this).data('status');
            console.log(id, status);
            $('#show-home-' + id).html('<i class="ri-handbag-line"></i>');
            var value, name;
            if(status == 1) {
                value = 0;
                name = '<i class="ri-close-circle-line" style="color: #dd3546;"></i>';
            } else {
                value = 1;
                name = '<i class="ri-checkbox-circle-line" style="color: #009688;"></i>';
            }
            $.ajax({
                type: "GET",
                dataType: "json",
                url: showHomeUrl,
                data: {'status': value, 'id': id},
                success: function(data) {
                    $('#show-home-' + id).html(name);
                    $('#show-home-' + id).attr('data-status', value);
                    $('#data-table').DataTable().ajax.reload();
                }
            });
        });
    </script>


@endpush
