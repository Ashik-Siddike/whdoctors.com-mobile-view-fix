@extends('admin.app')
@section('title')
    Amounts
@endsection

@section('content')


<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Amounts</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="Amounts">All Amounts</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-2">
                            <a href="{{ route('amount.create') }}" class="btn btn-outline-primary d-flex align-items-center">
                                <i class="ri-add-line me-1"></i> Create Amounts
                            </a>
                          <a href="{{ route('report.agent') }}" class="btn btn-outline-primary d-flex align-items-center">
                                <i class="ri-file-chart-line me-1"></i> Report
                            </a>

                        </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Agent Name</th>
                                <th>Particulars</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Dues</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($amounts as $key => $amount)
                            <tr>
                                 <td>{{ $key + 1 }}</td>
                               <td>{{ $amount->agent->name ?? 'N/A' }}</td>

                                <td>{{ $amount->particulars }}</td>
                                <td>{{ $amount->amount }}</td>
                                <td>{{ $amount->payments->sum('paid') }}</td>
                                <td>{{ $amount->dues }}</td>
                               <td>{{ \Carbon\Carbon::parse($amount->date)->format('j M, Y') }}</td>

                                <td>
                                {{-- <a href="{{ route('payment.index', $amount->id) }}" class="btn btn-info btn-sm" title="View Payments">
                                    <i class="ri-file-text-line"></i>
                                    <i class="ri-coins-line"></i>
                                </a> --}}

                                <a href="{{ route('payment.index', $amount->agent_id) }}" class="btn btn-info btn-sm" title="View Payments">
                                    <i class="ri-eye-line"></i>
                                </a>

                                  <a href="{{ route('amount.edit', $amount->id) }}" class="btn btn-warning btn-sm" title="edit" >
                                    <i class="ri-edit-line" ></i>
                                  </a>

                                    {{-- Optional Delete Button
                                    <a href="{{ route('amount.edit', $amount->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    {{-- <form action="{{ route('amount.destroy', $amount->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                    </form> --}}
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


@endsection
