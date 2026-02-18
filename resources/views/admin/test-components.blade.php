@extends('layouts.admin')

@section('content')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-4">
            <x-metronic.stats-widget title="Meeting Schedule" value="3:30PM - 4:20PM"
                description="Create a headline that is informative" color="primary" />
        </div>
        <div class="col-xl-4">
            <x-metronic.stats-widget title="UI Conference" value="10AM Jan, 2021"
                description="AirWays - A Front-end solution" color="warning" />
        </div>
        <div class="col-xl-4">
            <x-metronic.stats-widget title="Weekly Sales" value="$2,500" description="Increased by 5% this week"
                color="success" />
        </div>
    </div>

    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <x-metronic.table-widget title="Latest Members" subtitle="More than 400 new members">
                <x-slot name="columns">
                    <th>Author</th>
                    <th>Company</th>
                    <th>Progress</th>
                    <th class="text-end">Action</th>
                </x-slot>

                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-light-primary">
                                    <i class="ki-duotone ki-abstract-26 fs-2x text-primary"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">Brad Simmons</a>
                                <span class="text-muted fw-semibold d-block fs-7">HTML, JS, ReactJS</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                        <span class="text-muted fw-semibold d-block fs-7">Web, UI/UX Design</span>
                    </td>
                    <td>
                        <div class="d-flex flex-column w-100 me-2">
                            <div class="d-flex flex-stack mb-2">
                                <span class="text-muted me-2 fs-7 fw-bold">50%</span>
                            </div>
                            <div class="progress h-6px w-100">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                            <i class="ki-duotone ki-arrow-right fs-2"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </a>
                    </td>
                </tr>
            </x-metronic.table-widget>
        </div>
    </div>

    <div class="row g-5 g-xl-8">
        <div class="col-xl-4">
            <x-metronic.list-widget title="Tasks Overview" subtitle="Pending 10 tasks">
                <!--item-->
                <div class="d-flex align-items-center mb-7">
                    <div class="symbol symbol-50px me-5">
                        <span class="symbol-label bg-light-success">
                            <i class="ki-duotone ki-abstract-26 fs-2x text-success"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">Project Briefing</a>
                        <span class="text-muted fw-bold">Project Manager</span>
                    </div>
                </div>
                <!--item-->
                <div class="d-flex align-items-center mb-7">
                    <div class="symbol symbol-50px me-5">
                        <span class="symbol-label bg-light-warning">
                            <i class="ki-duotone ki-pencil fs-2x text-warning"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">Concept Design</a>
                        <span class="text-muted fw-bold">Art Director</span>
                    </div>
                </div>
            </x-metronic.list-widget>
        </div>

        <div class="col-xl-4">
            <x-metronic.mixed-widget title="Sales Summary" color="danger" description="Your Balance" stats="$37,562.00">
                <!--item-->
                <div class="d-flex align-items-center mb-6">
                    <div class="symbol symbol-45px w-40px me-5">
                        <span class="symbol-label bg-lighten">
                            <i class="ki-duotone ki-compass fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-center flex-wrap w-100">
                        <div class="mb-1 pe-3 flex-grow-1">
                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Sales</a>
                            <div class="text-gray-500 fw-semibold fs-7">100 Regions</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="fw-bold fs-5 text-gray-800 pe-1">$2,5b</div>
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                </div>
            </x-metronic.mixed-widget>
        </div>

        <div class="col-xl-4">
            <x-metronic.chart-widget title="Recent Statistics" subtitle="More than 400 new members"
                chartId="kt_charts_widget_1_chart" />
        </div>
    </div>
    <!-- Project Card -->
    <div class="row g-5 g-xl-8 mb-10">
        <div class="col-xl-4">
            <x-metronic.project-card title="Fitnes App" description="CRM App application to HR efficiency"
                status="In Progress" statusColor="primary" date="Jun 24, 2024" budget="$284,900.00" progress="50" :users="[
            ['avatar' => asset('metronic/assets/media/avatars/300-6.jpg'), 'name' => 'Emma Smith'],
            ['avatar' => asset('metronic/assets/media/avatars/300-1.jpg'), 'name' => 'Rudy Stone'],
            ['color' => 'primary', 'name' => 'Susan Redwood']
        ]" />
        </div>
        <div class="col-xl-4">
            <x-metronic.project-card title="Leaf CRM" description="CRM App application to HR efficiency" status="Pending"
                statusColor="warning" date="May 10, 2021" budget="$36,400.00" progress="30" :users="[
            ['color' => 'warning', 'name' => 'Alan Warden'],
            ['avatar' => asset('metronic/assets/media/avatars/300-5.jpg'), 'name' => 'Brian Cox']
        ]" icon="{{ asset('metronic/assets/media/svg/brand-logos/disqus.svg') }}" />
        </div>
    </div>

    <!-- Profile Card -->
    <div class="row mb-10">
        <div class="col-12">
            <x-metronic.profile-card name="Max Smith" role="Developer" location="SF, Bay Area" email="max@kt.com"
                avatar="{{ asset('metronic/assets/media/avatars/300-1.jpg') }}" :stats="[
            ['value' => '4,500', 'label' => 'Earnings', 'prefix' => '$', 'icon' => 'ki-arrow-up', 'color' => 'success'],
            ['value' => '80', 'label' => 'Projects', 'icon' => 'ki-arrow-down', 'color' => 'danger'],
            ['value' => '60', 'label' => 'Success Rate', 'prefix' => '%', 'icon' => 'ki-arrow-up', 'color' => 'success']
        ]" completeness="50" />
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Dummy chart initialization (if Metronic assets are loaded, this might work if KTChartsWidget1 is available, 
        // otherwise we'd need manual initialization. For now, we assume the assets might handle it or we leave it empty structure)
        // In a real scenario, we would initialize ApexCharts here.
    </script>
@endpush