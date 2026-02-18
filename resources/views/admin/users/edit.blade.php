@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                    name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.user.fields.name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                    name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.user.fields.email_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    type="password" name="password" id="password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.user.fields.password_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <div
                    class="form-check form-check-custom form-check-solid form-check-custom form-check-solid {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="approved" value="0">
                    <input class="form-check-input" type="checkbox" name="approved" id="approved" value="1" {{ $user->approved || old('approved', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="approved">{{ trans('cruds.user.fields.approved') }}</label>
                </div>
                @if($errors->has('approved'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.user.fields.approved_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all"
                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all"
                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control form-control-solid select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                    name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.user.fields.roles_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="team_id">{{ trans('cruds.user.fields.team') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('team') ? 'is-invalid' : '' }}"
                    name="team_id" id="team_id">
                    @foreach($teams as $id => $entry)
                        <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $user->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.user.fields.team_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection