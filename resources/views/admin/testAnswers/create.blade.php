@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.create') }} {{ trans('cruds.testAnswer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.test-answers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="test_result_id">{{ trans('cruds.testAnswer.fields.test_result') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('test_result') ? 'is-invalid' : '' }}" name="test_result_id" id="test_result_id" required>
                    @foreach($test_results as $id => $entry)
                        <option value="{{ $id }}" {{ old('test_result_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('test_result'))
                    <div class="invalid-feedback">
                        {{ $errors->first('test_result') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.testAnswer.fields.test_result_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="question_id">{{ trans('cruds.testAnswer.fields.question') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id" required>
                    @foreach($questions as $id => $entry)
                        <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.testAnswer.fields.question_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="option_id">{{ trans('cruds.testAnswer.fields.option') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('option') ? 'is-invalid' : '' }}" name="option_id" id="option_id" required>
                    @foreach($options as $id => $entry)
                        <option value="{{ $id }}" {{ old('option_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('option'))
                    <div class="invalid-feedback">
                        {{ $errors->first('option') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.testAnswer.fields.option_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <div class="form-check form-check-custom form-check-solid form-check-custom form-check-solid {{ $errors->has('is_correct') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_correct" value="0">
                    <input class="form-check-input" type="checkbox" name="is_correct" id="is_correct" value="1" {{ old('is_correct', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_correct">{{ trans('cruds.testAnswer.fields.is_correct') }}</label>
                </div>
                @if($errors->has('is_correct'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_correct') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.testAnswer.fields.is_correct_helper') }}</div>
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