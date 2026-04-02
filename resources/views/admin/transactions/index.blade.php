@extends('admin.app')

@section('title')
    Transaction
@endsection

@push('custom-style')
    {{-- Datatable CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
    {{-- Data Table --}}
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header d-flex justify-content-between align-items-center">
                        <div>
                            <div class="table-title">Transaction</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Transaction</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('transaction.create') }}" class="btn btn-outline-primary d-flex align-items-center">
                                <i class="ri-add-line me-1"></i> Create Transaction
                            </a>
                            <a href="{{ route('cashtransaction.report') }}" class="btn btn-outline-primary d-flex align-items-center">
                                <i class="ri-file-chart-line me-1"></i> Report
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Agent Name</th>
                                    <th scope="col">Dues</th>
                                    <th scope="col">Date</th>
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
    {{-- Moment.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    {{-- DataTable JS --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

    {{-- DataTable Ajax Call --}}
    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/transactions';

        $(document).ready(function () {
            $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                pageLength: 20,
                lengthMenu: [20, 50, 100, 500],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id', orderable: true },
                    {
                        data: 'agent',
                        name: 'agent_id',
                        orderable: true,
                        render: function (data) {
                            var agentHtml = '<div class="d-flex align-items-center justify-content-center">';
                            if (data.image != null) {
                                agentHtml += '<img src="' + SITEURL + '/' + data.image + '" class="rounded-circle me-2" style="width:30px; height:30px;">';
                            } else {
                                agentHtml += '<img src="' + SITEURL + '/images/user.jpeg" class="rounded-circle me-2" style="width:30px; height:30px;">';
                            }
                            agentHtml += '<span>' + data.name + '</span></div>';
                            return agentHtml;
                        }
                    },
                    { data: 'dues', name: 'dues', orderable: true },
                    {
                        data: 'date',
                        name: 'date',
                        orderable: true,
                        render: function (data) {
                            return data ? moment(data).format('DD-MM-YYYY') : '';
                        }
                    },
              {
                data: 'id',
                orderable: false,
                render: function (data, type, row) {
                    var buttons = '<div class="action-btn d-flex gap-1">';

                    // Use row.agent.id here

                        buttons += `<a href="${SITEURL}/dashboard/agentTransactions/${row.agent.id}" class="btn btn-view me-1" title="Agent Transaction"><i class="ri-eye-line"></i></a>`;


                    buttons += `<a href="${SITEURL}/dashboard/transaction/edit/${data}" class="btn btn-edit me-1" title="Edit Transaction"><i class="ri-edit-line"></i></a>`;
                    buttons += `<a href="${SITEURL}/dashboard/cashtransactions/${data}" class="btn btn-details me-1" title="Cash Transaction"><i class="ri-money-dollar-circle-line"></i></a>`;
                    buttons += `<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion('${SITEURL}/dashboard/transaction/delete/${data}')"><i class="ri-delete-bin-2-line"></i></a>`;
                    buttons += '</div>';
                    return buttons;
                }
            }


                ],
                columnDefs: [
                    { className: "text-center", targets: [0, 1, 2, 3] } // Action বাদে সবগুলোতে center
                ],
                order: [[0, 'asc']]
            });
        });
    </script>
@endpush
