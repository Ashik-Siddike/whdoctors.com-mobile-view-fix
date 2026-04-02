@extends('admin.app')
@section('title')
    Cash Transaction
@endsection
@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Cash Transaction</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('transactions')}}">Transaction</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('cashtransactions', $transaction->id)}}">Cash Transaction</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Cash Transaction</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('cashtransactions', $transaction->id)}}" class="add-new">Cash Transaction<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form action="{{ route('cashtransaction.update', ['id' => $cashtransaction->id]) }}" method="POST" class="row g-3 mt-0">
                            @csrf

                            <input type="hidden" name="transaction_id" value="{{ $cashtransaction->transaction_id }}">

                            <div class="col-12">
                                <label for="" class="form-label custom-label">Amount</label>
                                <input type="number" class="form-control custom-input" name="amount" value="{{ old('amount', $cashtransaction->amount) }}" placeholder="Amount">
                                @if($errors->has('amount'))
                                    <div class="error_msg">
                                        {{ $errors->first('amount') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="currency" class="form-label custom-label">Currency</label>
                                <select class="form-control custom-input" name="currency">
                                    @php
                                        $currencies = ['BDT', 'USD', 'GBP', 'JPY', 'INR', 'CNY', 'BTN', 'PKR', 'LKR', 'NPR', 'AUD', 'CAD', 'KRW', 'SAR', 'AED', 'TRY', 'BRL', 'MXN', 'RUB', 'ZAR', 'IDR', 'MYR', 'THB', 'SGD', 'QAR', 'KWD', 'SEK'];
                                    @endphp
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency }}" {{ old('currency', $cashtransaction->currency) == $currency ? 'selected' : '' }}>
                                            {{ $currency }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('currency'))
                                    <div class="error_msg">
                                        {{ $errors->first('currency') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="" class="form-label custom-label">Date</label>
                                <input id="datepicker" class="form-control custom-input" name="date" value="{{ old('date', \Carbon\Carbon::parse($cashtransaction->date)->format('d-M-Y')) }}" placeholder="Date">
                                @if($errors->has('date'))
                                    <div class="error_msg">
                                        {{ $errors->first('date') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="" class="form-label custom-label">Additional Note</label>
                                <textarea class="form-control custom-input" name="note" rows="5" placeholder="Additional Note" style="resize: none;">{{ old('note', $cashtransaction->note) }}</textarea>
                                @if($errors->has('note'))
                                    <div class="error_msg">
                                        {{ $errors->first('note') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn submit-button">
                                    Update
                                    <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
@endpush
