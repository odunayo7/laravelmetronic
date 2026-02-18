@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.create') }} {{ trans('cruds.note.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="project_id">{{ trans('cruds.note.fields.project') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.note.fields.project_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="note_text">{{ trans('cruds.note.fields.note_text') }}</label>
                <textarea class="form-control form-control-solid {{ $errors->has('note_text') ? 'is-invalid' : '' }}" name="note_text" id="note_text" required>{{ old('note_text') }}</textarea>
                @if($errors->has('note_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note_text') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.note.fields.note_text_helper') }}</div>
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