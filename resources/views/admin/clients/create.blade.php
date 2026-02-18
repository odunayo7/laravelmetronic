@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}">
        <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="first_name">{{ trans('cruds.client.fields.first_name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                    type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.first_name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="last_name">{{ trans('cruds.client.fields.last_name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                    type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.last_name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="company">{{ trans('cruds.client.fields.company') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text"
                    name="company" id="company" value="{{ old('company', '') }}">
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.company_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                    name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.email_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                    name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.phone_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="website">{{ trans('cruds.client.fields.website') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text"
                    name="website" id="website" value="{{ old('website', '') }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.website_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="skype">{{ trans('cruds.client.fields.skype') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text"
                    name="skype" id="skype" value="{{ old('skype', '') }}">
                @if($errors->has('skype'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skype') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.skype_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="country">{{ trans('cruds.client.fields.country') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text"
                    name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.country_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="status_id">{{ trans('cruds.client.fields.status') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('status') ? 'is-invalid' : '' }}"
                    name="status_id" id="status_id">
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.client.fields.status_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection