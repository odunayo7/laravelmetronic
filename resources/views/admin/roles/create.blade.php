@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}">
        <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                    name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.role.fields.title_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all"
                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all"
                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select
                    class="form-control form-control-solid select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
                    name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permission)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>
                            {{ $permission }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.role.fields.permissions_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection