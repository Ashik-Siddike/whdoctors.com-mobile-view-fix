@extends('admin.app')
@section('title')
    Contact Messages
@endsection



@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
<style>
    .readColor tbody tr{
        background-color: #eee!important;
    }
    .readColor tbody tr.readColorTr{
        background-color: #fff!important;
    }
</style>
@endpush



@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Contact Messages</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('course')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Message</li> 
                                </ol> 
                            </nav>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table dataTable w-100 readColor" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%">SL NO</th>
                                    <th scope="col" style="width: 10%">Name</th>
                                    <th scope="col" style="width: 10%">Contact No</th>
                                    <th scope="col" style="width: 55%">Message</th>
                                    <th scope="col" style="width: 5%">Important</th>
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

    <!-- Modal -->
    <div class="modal fade" id="readMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="readMessageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="readMessageLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection


@push('custom-scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

<script type="text/javascript">
    var listUrl = SITEURL + '/dashboard/message';
    var readStatusUrl = SITEURL + '/dashboard/message/read';
    var importantStatusUrl = SITEURL + '/dashboard/message/important';

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
                { data: 'phone', phone: 'name', orderable: true },
                { data: 'message', name: 'message', orderable: true },
                { data: 'important_status', 
                    name: 'important_status', 
                    orderable: true,
                    render: function (data) {
                        var name;
                        if(data.important_status == 1) {
                            name = '<i class="ri-star-s-fill" style="color: #f5c60d;"></i>';
                        } else {
                            name = '<i class="ri-star-s-line" style="color: #f5c60d;"></i>';
                        }
                        return '<div id="status-' + data.id + '" style="font-size: 20px;text-align: center;cursor: pointer" class="important-status-change" data-id="' + data.id + '" data-status="' + data.important_status + '" alt="acive or inactive">' + name + '</div>';
                    }
                },
                {
                    data: 'action-btn',
                    orderable: false,
                    render: function (data, type, row, meta) {
                        var trClass = data.read_status == 1 ? 'readColorTr' : '';
                        var actionButtons = '<div class="action-btn">';
                        actionButtons += '<a class="btn btn-edit" data-bs-toggle="modal" onclick="modalRead(this)" id="' + data.id + '"><i class="ri-book-read-line"></i></a>';
                        actionButtons += '<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion(\'' + SITEURL + '/dashboard/message/delete/' + data + '\')"><i class="ri-delete-bin-2-line"></i></a>';
                        actionButtons += '</div>';
                        
                        setTimeout(function() {
                            $('.readColor').find('tbody tr').eq(meta.row).addClass(trClass);
                        }, 0);

                        return actionButtons;
                    }
                }
            ],
            order: [[0, 'asc']],
        });
    });

    $('body').on('click', '.important-status-change', function () {
        var id = $(this).data('id');
        var status = $(this).data('status');
        $('#status-' + id).html('<i class="ri-handbag-line"></i>');
        var name;
        if(status == 1) {
            status = 0;
            name = '<i class="ri-star-s-line" style="color: #f5c60d;"></i>';
        } else {
            status = 1;
            name = '<i class="ri-star-s-fill" style="color: #f5c60d;"></i>';
        }

        $.ajax({
            type: "GET",
            dataType: "json",
            url: importantStatusUrl,
            data: {'important_status': status, 'id': id},
            success: function(data) {
                $('#status-' + id).html(name);
                $('#status-' + id).attr('data-status', status);
                $('#data-table').DataTable().ajax.reload();
            }
        });
    });

    function modalRead(e){
        var id = $(e).closest('tr').find('td').eq(0).text();
        var name = $(e).closest('tr').find('td').eq(1).text();
        var phone = $(e).closest('tr').find('td').eq(2).text();
        var message = $(e).closest('tr').find('td').eq(3).text();
        $.ajax({
            type: "GET",
            dataType: "json",
            url: readStatusUrl,
            data: {'id': id},
            success: function(data) {
                $(e).closest('tr').addClass('readColorTr');
                $('#readMessageLabel').text('Message from ' + name + ' (' + phone + ')');
                $('.modal-body').text(message);
                $('#readMessage').modal('show');
            }
        });
    }
</script>
@endpush
