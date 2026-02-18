@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}">
        <form method="POST" action="{{ route("admin.permissions.update", [$permission->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="title">{{ trans('cruds.permission.fields.title') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                    name="title" id="title" value="{{ old('title', $permission->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.permission.fields.title_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection