@props([
    'tabs' => [], // Array of ['id' => 'tab1', 'label' => 'Tab 1', 'active' => false]
    'id' => 'myTab'
])

<ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
    @foreach($tabs as $tab)
        <li class="nav-item">
            <a class="nav-link {{ $tab['active'] ?? false ? 'active' : '' }}" data-bs-toggle="tab" href="#{{ $tab['id'] }}">{{ $tab['label'] }}</a>
        </li>
    @endforeach
</ul>
<div class="tab-content" id="{{ $id }}Content">
    {{ $slot }}
</div>
