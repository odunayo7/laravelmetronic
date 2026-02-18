@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.edit') }} {{ trans('cruds.userAlert.title_singular') }}">
        <form method="POST" action="{{ route("admin.user-alerts.update", [$userAlert->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection