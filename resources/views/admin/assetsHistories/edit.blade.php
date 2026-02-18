@extends('layouts.admin')
@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        {{ trans('global.edit') }} {{ trans('cruds.assetsHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assets-histories.update", [$assetsHistory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection