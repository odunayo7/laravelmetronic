@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.edit') }} {{ trans('cruds.expense.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.expenses.update", [$expense->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="expense_category_id">{{ trans('cruds.expense.fields.expense_category') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('expense_category') ? 'is-invalid' : '' }}" name="expense_category_id" id="expense_category_id">
                    @foreach($expense_categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('expense_category_id') ? old('expense_category_id') : $expense->expense_category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('expense_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expense_category') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.expense.fields.expense_category_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="entry_date">{{ trans('cruds.expense.fields.entry_date') }}</label>
                <input class="form-control form-control-solid date {{ $errors->has('entry_date') ? 'is-invalid' : '' }}" type="text" name="entry_date" id="entry_date" value="{{ old('entry_date', $expense->entry_date) }}" required>
                @if($errors->has('entry_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('entry_date') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.expense.fields.entry_date_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="amount">{{ trans('cruds.expense.fields.amount') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $expense->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.expense.fields.amount_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="description">{{ trans('cruds.expense.fields.description') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $expense->description) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.expense.fields.description_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection