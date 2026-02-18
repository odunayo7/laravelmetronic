@extends('layouts.admin')
@section('content')

    <div class="mb-5">
        <x-metronic.profile-card name="{{ $user->name }}" role="{{ $user->roles->pluck('title')->implode(', ') }}"
            email="{{ $user->email }}" location="Unknown" avatar="{{ asset('metronic/assets/media/avatars/300-1.jpg') }}"
            :stats="[
            ['value' => $user->approved ? 'Yes' : 'No', 'label' => 'Approved', 'icon' => 'ki-check', 'color' => $user->approved ? 'success' : 'danger'],
            ['value' => $user->email_verified_at ? 'Verified' : 'Pending', 'label' => 'Email Status', 'icon' => 'ki-sms', 'color' => $user->email_verified_at ? 'success' : 'warning']
        ]"
            completeness="80" />
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#user_user_alerts" role="tab" data-bs-toggle="tab">
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="user_user_alerts">
                @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
            </div>
        </div>
    </div>

@endsection