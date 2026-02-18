@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.edit') }} {{ trans('cruds.assetCategory.title_singular') }}">
        <form method="POST" action="{{ route("admin.asset-categories.update", [$assetCategory->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="name">{{ trans('cruds.assetCategory.fields.name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                    name="name" id="name" value="{{ old('name', $assetCategory->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.assetCategory.fields.name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection