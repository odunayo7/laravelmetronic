@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.edit') }} {{ trans('cruds.timeProject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-projects.update", [$timeProject->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="name">{{ trans('cruds.timeProject.fields.name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $timeProject->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.timeProject.fields.name_helper') }}</div>
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