@extends('admin.app')
@section('title')
    Services
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
                        <div class="table-title">Service</div>
                        <nav aria-label="breadcrumb"> 
                            <ol class="breadcrumb mb-0"> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li> 
                                <li class="breadcrumb-item active" aria-current="service">Service</li> 
                            </ol> 
                        </nav>
                    </div>
                    <a href="{{route('service.create')}}" class="add-new">Create Service<i class="ms-1 ri-add-line"></i></a>
                </div>
                <div class="card-body">
                    <table class="table w-100" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Category</th>
                                <th scope="col">Title</th>
                                <th scope="col">Subtitle</th>
                                {{-- <th scope="col">Description</th> --}}
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/services';

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
                    { data: 'category', name: 'category_id', orderable: true },
                    { data: 'title', name: 'title', orderable: true },
                    { data: 'subtitle', name: 'subtitle', orderable: true },
                    // { data: 'description', name: 'description', orderable: false },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/service/edit/' + data + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion(\'' + SITEURL + '/dashboard/service/delete/' + data + '\')"><i class="ri-delete-bin-2-line"></i></a>';
                            btn1 += '</div>';
                            return btn1;
                        }
                    } 
                ],
                order: [[0, 'asc']]
            });
        });
    </script>
@endpush
