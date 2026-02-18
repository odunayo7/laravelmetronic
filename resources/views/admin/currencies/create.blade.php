@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.create') }} {{ trans('cruds.currency.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.currencies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="name">{{ trans('cruds.currency.fields.name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.currency.fields.name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="code">{{ trans('cruds.currency.fields.code') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.currency.fields.code_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <div class="form-check form-check-custom form-check-solid form-check-custom form-check-solid {{ $errors->has('main_currency') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="main_currency" value="0">
                    <input class="form-check-input" type="checkbox" name="main_currency" id="main_currency" value="1" {{ old('main_currency', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="main_currency">{{ trans('cruds.currency.fields.main_currency') }}</label>
                </div>
                @if($errors->has('main_currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('main_currency') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.currency.fields.main_currency_helper') }}</div>
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