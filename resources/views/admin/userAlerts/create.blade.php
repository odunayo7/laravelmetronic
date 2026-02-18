@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.create') }} {{ trans('cruds.userAlert.title_singular') }}">
        <form method="POST" action="{{ route("admin.user-alerts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="alert_text">{{ trans('cruds.userAlert.fields.alert_text') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('alert_text') ? 'is-invalid' : '' }}"
                    type="text" name="alert_text" id="alert_text" value="{{ old('alert_text', '') }}" required>
                @if($errors->has('alert_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alert_text') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.userAlert.fields.alert_text_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="alert_link">{{ trans('cruds.userAlert.fields.alert_link') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('alert_link') ? 'is-invalid' : '' }}"
                    type="text" name="alert_link" id="alert_link" value="{{ old('alert_link', '') }}">
                @if($errors->has('alert_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alert_link') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.userAlert.fields.alert_link_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="users">{{ trans('cruds.userAlert.fields.user') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all"
                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all"
                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control form-control-solid select2 {{ $errors->has('users') ? 'is-invalid' : '' }}"
                    name="users[]" id="users" multiple>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ in_array($id, old('users', [])) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.userAlert.fields.user_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection