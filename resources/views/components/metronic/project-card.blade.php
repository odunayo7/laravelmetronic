@props([
    'title',
    'description',
    'status' => 'In Progress',
    'statusColor' => 'primary',
    'icon' => null,
    'date' => null,
    'budget' => null,
    'progress' => 0,
    'users' => []
])

<a href="#" {{ $attributes->merge(['class' => 'card border-hover-primary']) }}>
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                @if($icon)
                    <img src="{{ $icon }}" alt="image" class="p-3" />
                @else
                    <div class="symbol-label fs-2 fw-semibold text-{{ $statusColor }}">
                        {{ substr($title, 0, 1) }}
                    </div>
                @endif
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-{{ $statusColor }} fw-bold me-auto px-4 py-3">{{ $status }}</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->
    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">{{ $title }}</div>
        <!--end::Name-->
        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">{{ $description }}</p>
        <!--end::Description-->
        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            @if($date)
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">{{ $date }}</div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            @endif
            <!--end::Due-->
            <!--begin::Budget-->
            @if($budget)
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">{{ $budget }}</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            @endif
            <!--end::Budget-->
        </div>
        <!--end::Info-->
        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project {{ $progress }}% completed">
            <div class="bg-{{ $statusColor }} rounded h-4px" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->
        <!--begin::Users-->
        <div class="symbol-group symbol-hover">
            @foreach($users as $user)
                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $user['name'] ?? 'User' }}">
                    @if(isset($user['avatar']))
                        <img alt="Pic" src="{{ $user['avatar'] }}" />
                    @else
                        <span class="symbol-label bg-{{ $user['color'] ?? 'primary' }} text-inverse-{{ $user['color'] ?? 'primary' }} fw-bold">{{ substr($user['name'] ?? 'U', 0, 1) }}</span>
                    @endif
                </div>
            @endforeach
        </div>
        <!--end::Users-->
    </div>
    <!--end:: Card body-->
</a>
