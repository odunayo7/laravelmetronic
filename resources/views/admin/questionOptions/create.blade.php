@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.create') }} {{ trans('cruds.questionOption.title_singular') }}">
        <form method="POST" action="{{ route("admin.question-options.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="question_id">{{ trans('cruds.questionOption.fields.question') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('question') ? 'is-invalid' : '' }}"
                    name="question_id" id="question_id">
                    @foreach($questions as $id => $entry)
                        <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.questionOption.fields.question_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="option_text">{{ trans('cruds.questionOption.fields.option_text') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('option_text') ? 'is-invalid' : '' }}"
                    type="text" name="option_text" id="option_text" value="{{ old('option_text', '') }}" required>
                @if($errors->has('option_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('option_text') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.questionOption.fields.option_text_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <div
                    class="form-check form-check-custom form-check-solid form-check-custom form-check-solid {{ $errors->has('is_correct') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_correct" value="0">
                    <input class="form-check-input" type="checkbox" name="is_correct" id="is_correct" value="1" {{ old('is_correct', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="is_correct">{{ trans('cruds.questionOption.fields.is_correct') }}</label>
                </div>
                @if($errors->has('is_correct'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_correct') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.questionOption.fields.is_correct_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection