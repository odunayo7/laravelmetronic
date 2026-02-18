@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.create') }} {{ trans('cruds.timeEntry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-entries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="work_type_id">{{ trans('cruds.timeEntry.fields.work_type') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('work_type') ? 'is-invalid' : '' }}" name="work_type_id" id="work_type_id">
                    @foreach($work_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('work_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('work_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_type') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.timeEntry.fields.work_type_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="project_id">{{ trans('cruds.timeEntry.fields.project') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.timeEntry.fields.project_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="start_time">{{ trans('cruds.timeEntry.fields.start_time') }}</label>
                <input class="form-control form-control-solid datetime {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.timeEntry.fields.start_time_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="end_time">{{ trans('cruds.timeEntry.fields.end_time') }}</label>
                <input class="form-control form-control-solid datetime {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                @if($errors->has('end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.timeEntry.fields.end_time_helper') }}</div>
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