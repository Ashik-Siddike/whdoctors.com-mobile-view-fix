@extends('admin.app')
@section('title')
conference Categories
@endsection

@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<style>
    .table-card { border-radius: 10px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); }
    .table-header { display: flex; justify-content: space-between; align-items: center; background: #f8f9fa; padding: 15px; border-radius: 10px 10px 0 0; }
    .add-new { background: #007bff; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; }
    .add-new:hover { background: #0056b3; }
    .btn-edit, .btn-delete { margin-right: 5px; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none; }
    .btn-edit { background: #ffc107; }
    .btn-delete { background: #dc3545; }
</style>
@endpush

@section('content')
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title"><b>Conference Category</b></div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="category">Conference Category</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('conference.category.create')}}" class="add-new">Create Category <i class="ms-1 ri-add-line"></i></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered w-100" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

<script>
$(document).ready(function () {
    var listUrl = "{{ route('conference.categories') }}";

    var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        fixedHeader: true,
        pageLength: 20,
        lengthMenu: [20, 50, 100, 500],
        ajax: {
            url: listUrl,
            type: 'GET'
        },
        columns: [
            { data: 'id', name: 'id', orderable: true },
            { data: 'title', name: 'title', orderable: true },
            {
                data: 'id',
                orderable: false,
                render: function (data) {
                    return `
                        <div class="action-btn">
                            <a href="{{ route('conference.category.edit', '') }}/${data}" class="btn btn-edit"><i class="ri-edit-line"></i></a>
                            <a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion('{{ route('conference.category.delete', '') }}/${data}')"><i class="ri-delete-bin-2-line"></i></a>
                        </div>
                    `;
                }
            }
        ],
        order: [[0, 'asc']]
    });
});

function confirmDeletion(url) {
    if (confirm('Are you sure you want to delete this category?')) {
        $.ajax({
            url: url,
            type: 'DELETE',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function (response) {
                alert('Category deleted successfully!');
                $('#data-table').DataTable().ajax.reload();
            },
            error: function (error) {
                alert('Error deleting category!');
            }
        });
    }
}
</script>
@endpush
