@extends('admin.app')

@section('title')
    Dashboard
@endsection


@push('custom-style')
   {{-- Datatable css  --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
    <div class="container-fluid my-4">
        <div class="row g-3">
            @canany(['service-list', 'service-create', 'service-edit', 'service-delete'])
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="dashboard-details">
                                <div class="dashboard-icon">
                                    <a href="{{route('services')}}"><i class="ri-customer-service-2-line"></i></a>
                                </div>
                                <div class="dashboard-info">
                                    <p>Services</p>
                                    <h3 class="numbers">{{$total_services}}</h3>
                                    <a href="{{route('services')}}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            
            @canany(['blog-category-list', 'blog-category-create', 'blog-category-edit', 'blog-category-delete'])
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="dashboard-details">
                                <div class="dashboard-icon">
                                    <a href="{{route('blogs')}}" class="bg-info"><i class="ri-article-line"></i></a>
                                </div>
                                <div class="dashboard-info">
                                    <p>Blog</p>
                                    <h3 class="numbers">{{$total_blogs}}</h3>
                                    <a href="{{route('blogs')}}" class="text-info">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @canany(['course-list', 'course-create', 'course-edit', 'course-delete'])
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="dashboard-details">
                                <div class="dashboard-icon">
                                    <a href="{{route('course')}}"><i class="ri-mini-program-line"></i></a>
                                </div>
                                <div class="dashboard-info">
                                    <p>Courses</p>
                                    <h3 class="numbers">{{ $total_courses }}</h3>
                                    <a href="{{route('course')}}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @canany(['university-list', 'university-create', 'university-edit', 'university-delete'])
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="dashboard-details">
                                <div class="dashboard-icon">
                                    <a href="{{route('university')}}" class="bg-info"><i class="ri-graduation-cap-line"></i></a>
                                </div>
                                <div class="dashboard-info">
                                    <p>University</p>
                                    <h3 class="numbers">{{ $total_universities }}</h3>
                                    <a href="{{route('university')}}" class="text-info">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan


            @canany(['cashtransaction-list', 'cashtransaction-create', 'cashtransaction-edit', 'cashtransaction-delete'])
                <div class="col-6">
                    <div class="card table-card dashboard-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Cash Transactions</div>
                            </div>
                        </div>
                        <div class="card-body top-deals-wrapper">
                            <table class="table w-100 data-table-transaction" id="data-table-1">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan

            @canany(['apply-list', 'apply-create', 'apply-edit', 'apply-delete'])
                <div class="col-6">
                    <div class="card table-card dashboard-table">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Latest Applications</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table w-100 data-table-apply" id="data-table-2">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan

            @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
                <div class="col-12">
                    <div class="card table-card dashboard-table">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Users</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table w-100 data-table-user" id="data-table-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan

        </div>
    </div>
@endsection

@push('custom-scripts')
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>



    {{-- Datatable Ajax Call Transaction--}}
    <script type="text/javascript">
        var listUrl1 = SITEURL + '/dashboard/transactions';

        $(document).ready( function () {
            var table = $('.data-table-transaction').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl1,
                    type: 'GET'
                },
                columns: [
                    { 
                        data: 'agent', 
                        name: 'agent_id',
                        orderable: true,
                        render: function (data) {
                            var agent = '';
                            agent += '<div class="agent-name">';
                            agent += '<span class="agent-name">' + data.name + '</span>';
                            agent += '</div>';
                            return agent;
                        }
                    },
                    { data: 'amount', name: 'amount', orderable: true },
                    { data: 'date', name: 'date', orderable: true },
                    
                ],
                order: [[0, 'asc']]
            });
        });
    </script>
    

    {{-- Datatable Ajax Call Apply--}}
    <script type="text/javascript">
        var listUrl2 = SITEURL + '/dashboard/applies';

        $(document).ready( function () {
            var table = $('.data-table-apply').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl2,
                    type: 'GET'
                },
                columns: [
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'email', name: 'email', orderable: true },
                    { data: 'phone', name: 'phone', orderable: true },
                    
                ],
                order: [[0, 'asc']]
            });
        });
    </script>
    

    {{-- Datatable Ajax Call User--}}
    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/users';

        $(document).ready( function () {
            var table = $('.data-table-user').DataTable({
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
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'email', name: 'email', orderable: true },
                    { data: 'phone_no', name: 'phone_no', orderable: true }
                ],
                order: [[0, 'asc']]
            });
        });
    </script>



@endpush