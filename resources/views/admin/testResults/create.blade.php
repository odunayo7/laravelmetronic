@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.create') }} {{ trans('cruds.testResult.title_singular') }}">
        <form method="POST" action="{{ route("admin.test-results.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="test_id">{{ trans('cruds.testResult.fields.test') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('test') ? 'is-invalid' : '' }}"
                    name="test_id" id="test_id" required>
                    @foreach($tests as $id => $entry)
                        <option value="{{ $id }}" {{ old('test_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('test'))
                    <div class="invalid-feedback">
                        {{ $errors->first('test') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.testResult.fields.test_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="student_id">{{ trans('cruds.testResult.fields.student') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('student') ? 'is-invalid' : '' }}"
                    name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.testResult.fields.student_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="score">{{ trans('cruds.testResult.fields.score') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('score') ? 'is-invalid' : '' }}" type="number"
                    name="score" id="score" value="{{ old('score', '') }}" step="1">
                @if($errors->has('score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('score') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.testResult.fields.score_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection