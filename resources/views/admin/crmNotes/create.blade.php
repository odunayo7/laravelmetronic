@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.create') }} {{ trans('cruds.crmNote.title_singular') }}">
        <form method="POST" action="{{ route("admin.crm-notes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="customer_id">{{ trans('cruds.crmNote.fields.customer') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}"
                    name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.crmNote.fields.customer_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="note">{{ trans('cruds.crmNote.fields.note') }}</label>
                <textarea class="form-control form-control-solid {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note"
                    id="note" required>{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.crmNote.fields.note_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection