@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.create') }} {{ trans('cruds.incomeSource.title_singular') }}">
        <form method="POST" action="{{ route("admin.income-sources.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="name">{{ trans('cruds.incomeSource.fields.name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                    name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.incomeSource.fields.name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="fee_percent">{{ trans('cruds.incomeSource.fields.fee_percent') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('fee_percent') ? 'is-invalid' : '' }}"
                    type="number" name="fee_percent" id="fee_percent" value="{{ old('fee_percent', '') }}" step="0.01">
                @if($errors->has('fee_percent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fee_percent') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.incomeSource.fields.fee_percent_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection