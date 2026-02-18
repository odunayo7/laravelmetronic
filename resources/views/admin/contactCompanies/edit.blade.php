@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.edit') }} {{ trans('cruds.contactCompany.title_singular') }}">
        <form method="POST" action="{{ route("admin.contact-companies.update", [$contactCompany->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="company_name">{{ trans('cruds.contactCompany.fields.company_name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('company_name') ? 'is-invalid' : '' }}"
                    type="text" name="company_name" id="company_name"
                    value="{{ old('company_name', $contactCompany->company_name) }}">
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.contactCompany.fields.company_name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="company_address">{{ trans('cruds.contactCompany.fields.company_address') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('company_address') ? 'is-invalid' : '' }}"
                    type="text" name="company_address" id="company_address"
                    value="{{ old('company_address', $contactCompany->company_address) }}">
                @if($errors->has('company_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_address') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.contactCompany.fields.company_address_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="company_website">{{ trans('cruds.contactCompany.fields.company_website') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('company_website') ? 'is-invalid' : '' }}"
                    type="text" name="company_website" id="company_website"
                    value="{{ old('company_website', $contactCompany->company_website) }}">
                @if($errors->has('company_website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_website') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.contactCompany.fields.company_website_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="company_email">{{ trans('cruds.contactCompany.fields.company_email') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('company_email') ? 'is-invalid' : '' }}"
                    type="text" name="company_email" id="company_email"
                    value="{{ old('company_email', $contactCompany->company_email) }}">
                @if($errors->has('company_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_email') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.contactCompany.fields.company_email_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection