@extends('admin.app')
@section('title')
Office Section
@endsection

@push('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-y8DjN49yO6WyMWNnVG9k+Kpij9LQieLtVZ7U5+Ue2zVV0NNfwD9C07SkcRBxD/TG0ayJAl9+ydhs0uCRHkP5Yg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endpush

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Office Section</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Office Section</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('Office.create')}}" class="add-new">Add Office Section<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table dataTable w-100" id="data-table">
                            <thead>
                                <tr>

                                    <th>#SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($offices as $i => $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td class="text-center"> {{ $item->title }}</td>
                                        <td class="text-center"> {{ $item->phone }}</td>
                                        <td class="text-center"> {{ $item->email }}</td>
                                        <td class="text-center">
                                            @if ($item->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @elseif ($item->status == 0)
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>




                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('Office.show', $item->id) }}" class="btn btn-sm btn-primary me-2"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('Office.edit', $item->id) }}" class="btn btn-sm btn-warning me-2"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('Office.destroy', $item->id) }}" method="post" class="d-inline delete-form" data-id="{{ $item->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger delete-btn h-100" data-id="{{ $item->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel"><i class="fa fa-trash me-2"></i> Confirm Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-5">Are you sure you want to delete this About Section?</p>
                <i class="fa fa-exclamation-triangle fa-2x text-warning"></i>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger px-4" id="confirmDeleteBtn">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>





@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


$(document).ready(function () {
        let deleteForm = null;

        // Delete button click
        $('.delete-btn').click(function () {
            deleteForm = $(this).closest('form'); // Store the form
            $('#deleteModal').modal('show'); // Show modal
        });

        // Confirm delete from modal
        $('#confirmDeleteBtn').click(function () {
            if (deleteForm) {
                deleteForm.submit();
            }
        });
    });

</script>



