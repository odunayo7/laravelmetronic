@props([
    'trigger' => 'click', // click, hover
    'placement' => 'bottom-start',
    'width' => '200px'
])

<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-{{ $width }} py-3" data-kt-menu="true">
    {{ $slot }}
</div>

<!-- Trigger button should be separate or wrapping this if logic allows, but Metronic menus usually detach. -->
<!-- Usage: 
<button data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">Open</button>
<x-metronic.general.menu> ... </x-metronic.general.menu>
-->
