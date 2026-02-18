@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.create') }} {{ trans('cruds.test.title_singular') }}">
        <form method="POST" action="{{ route("admin.tests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="course_id">{{ trans('cruds.test.fields.course') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('course') ? 'is-invalid' : '' }}"
                    name="course_id" id="course_id">
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.test.fields.course_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="lesson_id">{{ trans('cruds.test.fields.lesson') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('lesson') ? 'is-invalid' : '' }}"
                    name="lesson_id" id="lesson_id">
                    @foreach($lessons as $id => $entry)
                        <option value="{{ $id }}" {{ old('lesson_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lesson'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lesson') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.test.fields.lesson_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="title">{{ trans('cruds.test.fields.title') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                    name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.test.fields.title_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="description">{{ trans('cruds.test.fields.description') }}</label>
                <textarea class="form-control form-control-solid {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.test.fields.description_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <div
                    class="form-check form-check-custom form-check-solid form-check-custom form-check-solid {{ $errors->has('is_published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_published" value="0">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">{{ trans('cruds.test.fields.is_published') }}</label>
                </div>
                @if($errors->has('is_published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_published') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.test.fields.is_published_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection