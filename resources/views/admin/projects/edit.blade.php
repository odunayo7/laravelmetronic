@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.update", [$project->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="name">{{ trans('cruds.project.fields.name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $project->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.project.fields.name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="client_id">{{ trans('cruds.project.fields.client') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $project->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.project.fields.client_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="description">{{ trans('cruds.project.fields.description') }}</label>
                <textarea class="form-control form-control-solid {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $project->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.project.fields.description_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
                <input class="form-control form-control-solid date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date) }}">
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.project.fields.start_date_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="budget">{{ trans('cruds.project.fields.budget') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="number" name="budget" id="budget" value="{{ old('budget', $project->budget) }}" step="0.01">
                @if($errors->has('budget'))
                    <div class="invalid-feedback">
                        {{ $errors->first('budget') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.project.fields.budget_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="status_id">{{ trans('cruds.project.fields.status') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $project->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.project.fields.status_helper') }}</div>
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