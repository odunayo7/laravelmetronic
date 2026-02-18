@extends('layouts.metronic')

@section('page_title', 'Dashboard')

@section('breadcrumbs')
    <x-metronic.base.breadcrumb :items="[
            ['label' => 'Home', 'url' => '#'],
            ['label' => 'Dashboards', 'active' => true]
        ]" separator="bullet" />
@endsection

@section('content')
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!-- Stats Widgets -->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <x-metronic.stats-widget title="Active Projects" value="69" description="43 Pending" icon="ki-abstract-26"
                color="danger" progress="72" />
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <x-metronic.stats-widget title="Revenue" value="$69,700" description="2.2% Increase" icon="ki-dollar"
                color="success" />
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <x-metronic.stats-widget title="New Users" value="357" description="Joined Today" icon="ki-user"
                color="primary" />
        </div>

        <!-- List Widget -->
        <div class="col-xl-6 mb-5 mb-xl-10">
            <x-metronic.list-widget title="Recent Activities" subtitle="Tasks Overview" :items="[
            ['title' => 'Project Briefing', 'subtitle' => 'Project Manager', 'icon' => 'ki-abstract-26', 'color' => 'success'],
            ['title' => 'Concept Design', 'subtitle' => 'Art Director', 'icon' => 'ki-pencil', 'color' => 'warning'],
            ['title' => 'Functional Logics', 'subtitle' => 'Lead Developer', 'icon' => 'ki-message-text-2', 'color' => 'primary'],
        ]" />
        </div>

        <!-- Chart Widget (Static Placeholder until JS init) -->
        <div class="col-xl-6 mb-5 mb-xl-10">
            <x-metronic.chart-widget title="Campaign Performance" subtitle="Weekly Stats" chartId="dashboard_chart_1"
                height="350">
                <div class="d-flex flex-wrap pt-5">
                    <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                        <div class="d-flex align-items-center mb-3 mb-sm-6">
                            <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                            <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                            <span class="fw-bold text-gray-600 fs-6">Google Ads</span>
                        </div>
                    </div>
                </div>
            </x-metronic.chart-widget>
        </div>
    </div>
@endsection