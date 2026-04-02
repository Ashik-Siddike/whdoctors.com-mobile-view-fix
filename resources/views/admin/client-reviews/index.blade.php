@extends('admin.app')
@section('title')
    Client Review
@endsection



@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush



@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Client Review</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Client Review</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('client-review.create')}}" class="add-new">Create Client Review<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table dataTable w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%">SL NO</th>
                                    <th scope="col" style="width: 15%">Name</th>
                                    <th scope="col" style="width: 15%">Designation</th>
                                    <th scope="col" style="width: 45%">Review</th>
                                    <th scope="col" style="width: 5%">Status</th>
                                    <th scope="col" style="width: 10%">Action</th>
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
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>


<script type="text/javascript">
    var listUrl = SITEURL + '/dashboard/client-review';
    var statusUrl = SITEURL + '/dashboard/client-review/change/status';

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
                { data: 'review', name: 'review', orderable: true },
                { data: 'status', 
                    name: 'status', 
                    orderable: true,
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
                        btn1 += '<a href="' + SITEURL + '/dashboard/client-review/edit/' + data + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                        btn1 += '<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion(\'' + SITEURL + '/dashboard/client-review/delete/' + data + '\')"><i class="ri-delete-bin-2-line"></i></a>';
                        
                        btn1 += '</div>';
                        return btn1;
                    }
                }
            ],
            order: [[0, 'asc']],
        });
    });

    $('body').on('click', '.status-change', function () {
        swal({
            title: "Are you sure?",
            text: "Do you want to change the status?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willChange) => {
            if (willChange) {
                var id = $(this).data('id');
                var status = $(this).data('status');
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
            }else{
                return false;
            }
        
        });
    });
</script>
@endpush
