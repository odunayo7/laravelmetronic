@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.create') }} {{ trans('cruds.income.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.incomes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="income_category_id">{{ trans('cruds.income.fields.income_category') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('income_category') ? 'is-invalid' : '' }}" name="income_category_id" id="income_category_id">
                    @foreach($income_categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('income_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('income_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('income_category') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.income.fields.income_category_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="entry_date">{{ trans('cruds.income.fields.entry_date') }}</label>
                <input class="form-control form-control-solid date {{ $errors->has('entry_date') ? 'is-invalid' : '' }}" type="text" name="entry_date" id="entry_date" value="{{ old('entry_date') }}" required>
                @if($errors->has('entry_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('entry_date') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.income.fields.entry_date_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="amount">{{ trans('cruds.income.fields.amount') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.income.fields.amount_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="description">{{ trans('cruds.income.fields.description') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.income.fields.description_helper') }}</div>
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