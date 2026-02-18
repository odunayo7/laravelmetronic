@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.create') }} {{ trans('cruds.faqQuestion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.faq-questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="category_id">{{ trans('cruds.faqQuestion.fields.category') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.faqQuestion.fields.category_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="question">{{ trans('cruds.faqQuestion.fields.question') }}</label>
                <textarea class="form-control form-control-solid {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question" id="question" required>{{ old('question') }}</textarea>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.faqQuestion.fields.question_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="answer">{{ trans('cruds.faqQuestion.fields.answer') }}</label>
                <textarea class="form-control form-control-solid {{ $errors->has('answer') ? 'is-invalid' : '' }}" name="answer" id="answer" required>{{ old('answer') }}</textarea>
                @if($errors->has('answer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.faqQuestion.fields.answer_helper') }}</div>
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