<div class="card shadow rounded p-4">
    <h4 class="mb-4">Add New Amount</h4>

    <form action="{{ route('amount.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="agent_id" class="form-label">Select Agent</label>
                <select name="agent_id" class="form-select" required>
                    <option value="">-- Select Agent --</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                            {{ $agent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="particulars" class="form-label">Particulars</label>
                <input type="text" name="particulars" class="form-control" value="{{ old('particulars', $amount->particulars ?? '') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $amount->amount ?? '') }}" required>
            </div>

            <div class="col-md-4">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="{{ old('date', $amount->date ?? '') }}" required>
            </div>

            <div class="col-md-4">
                <label for="currency" class="form-label">Currency</label>
                <select name="currency" class="form-select" required>
                    @foreach(['BDT','USD','INR','PKR'] as $currency)
                        <option value="{{ $currency }}" {{ old('currency', $amount->currency ?? 'BDT') == $currency ? 'selected' : '' }}>
                            {{ $currency }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea name="note" class="form-control" rows="3">{{ old('note', $amount->note ?? '') }}</textarea>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                <i class="ri-save-line"></i> Save Amount
            </button>
        </div>
    </form>
</div>
