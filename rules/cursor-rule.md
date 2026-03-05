# Metronic UI/UX Cursor Rules — Laravel Blade

> Derived from: `demo1/` HTML templates and `resources/views/components/metronic/` Blade source files.
> Do NOT rely on any external reference docs. These rules describe exactly what is implemented.

---

## 1. Admin Layout

Every admin view **must** follow this structure:

```blade
@extends('layouts.admin')

@section('content')
    {{-- Page content --}}
@endsection

@section('scripts')
    @parent
    <script>
        // Page-specific JS
    </script>
@endsection
```

The `layouts.admin` file includes all Metronic partials (head, header, sidebar, toolbar, footer, scripts, admin_scripts) — do not add them manually.

The body element uses these data attributes to control app layout behaviour:

```html
<body id="kt_app_body"
    data-kt-app-layout="dark-sidebar"
    data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true"
    data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true"
    data-kt-app-toolbar-enabled="true"
    class="app-default">
```

Flash messages live inside the layout before `@yield('content')`:

```blade
@if(session('message'))
    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
@endif

@if($errors->count() > 0)
    <div class="alert alert-danger">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

---

## 2. Card — `x-metronic.card`

**Source:** `components/metronic/card.blade.php`

The primary content container for every page section.

### Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `title` | string | `''` | Card header title |
| `$toolbar` | slot | `null` | Right-side action area in card header |
| `$footer` | slot | `null` | Card footer content |
| `flush` | bool | `false` | Adds `card-flush` — removes top border/padding from header |

### Usage Examples

```blade
{{-- Basic --}}
<x-metronic.card title="User List">
    {{-- body content --}}
</x-metronic.card>

{{-- With toolbar actions --}}
<x-metronic.card title="Lessons">
    <x-slot:toolbar>
        <a href="{{ route('admin.lessons.create') }}" class="btn btn-sm btn-primary">
            Add Lesson
        </a>
    </x-slot:toolbar>
    {{-- body --}}
</x-metronic.card>

{{-- Flush (no card header border) --}}
<x-metronic.card :flush="true" title="Edit Lesson">
    {{-- form --}}
</x-metronic.card>

{{-- With footer --}}
<x-metronic.card title="Settings">
    {{-- form fields --}}
    <x-slot:footer>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-light ms-2">Cancel</a>
    </x-slot:footer>
</x-metronic.card>
```

### Raw HTML

```html
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Title</h3>
        <div class="card-toolbar"><!-- actions --></div>
    </div>
    <div class="card-body"><!-- content --></div>
    <div class="card-footer"><!-- footer --></div>
</div>
```

---

## 3. Button — `x-metronic.base.button`

**Source:** `components/metronic/base/button.blade.php`

### Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `url` | string | `null` | If set, renders `<a>`, else `<button>` |
| `type` | string | `'primary'` | Color: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `light-primary`, `light-danger`, etc. |
| `icon` | string | `null` | `ki-duotone` icon name e.g. `ki-plus` |
| `size` | string | `''` | `sm`, `lg` |
| `outline` | bool | `false` | Applies `btn-outline btn-outline-{type} btn-active-light-{type}` |
| `dashed` | bool | `false` | Adds `btn-outline-dashed` (only effective when `outline=true`) |
| `active` | bool | `false` | Adds `active` class |
| `disabled` | bool | `false` | Adds `disabled` attribute |
| `text` | string | `''` | Button label (can also use `$slot`) |

When `icon` is set and no `text` or `$slot` is provided, `btn-icon` is automatically added (icon-only square button).

### Usage Examples

```blade
{{-- Text button --}}
<x-metronic.base.button type="primary" text="Save Changes" />

{{-- Link button (renders <a>) --}}
<x-metronic.base.button
    url="{{ route('admin.users.create') }}"
    type="success"
    text="Add User" />

{{-- Small danger button --}}
<x-metronic.base.button type="danger" size="sm" text="Delete" />

{{-- Icon + text --}}
<x-metronic.base.button type="primary" icon="ki-plus" text="New Record" />

{{-- Icon only --}}
<x-metronic.base.button type="light-danger" icon="ki-trash" />

{{-- Outline dashed --}}
<x-metronic.base.button type="primary" :outline="true" :dashed="true" text="Upload File" />

{{-- Disabled --}}
<x-metronic.base.button type="primary" :disabled="true" text="Processing" />
```

### CRUD table action buttons

In index tables, always use `btn-xs` for row actions:

```blade
@can('lesson_show')
    <a class="btn btn-xs btn-primary" href="{{ route('admin.lessons.show', $lesson->id) }}">
        {{ trans('global.view') }}
    </a>
@endcan

@can('lesson_edit')
    <a class="btn btn-xs btn-info" href="{{ route('admin.lessons.edit', $lesson->id) }}">
        {{ trans('global.edit') }}
    </a>
@endcan

@can('lesson_delete')
    <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST"
        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
        style="display: inline-block;">
        @method('DELETE')
        @csrf
        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
    </form>
@endcan
```

---

## 4. Icons — `ki-duotone`

All icons use the Keenthemes **duotone** icon set. Each icon needs its `<span class="pathN">` children or it will not render correctly.

```html
{{-- Two-path icon (most common) --}}
<i class="ki-duotone ki-{name} fs-2">
    <span class="path1"></span>
    <span class="path2"></span>
</i>

{{-- Three-path icon --}}
<i class="ki-duotone ki-{name} fs-3x text-primary">
    <span class="path1"></span>
    <span class="path2"></span>
    <span class="path3"></span>
</i>
```

**Seen in actual component files:**

| Icon | Used in |
|---|---|
| `ki-cross` | Modal close, drawer close |
| `ki-pencil` | Image-input edit label |
| `ki-plus` | Repeater add button |
| `ki-file-up` | Dropzone upload message |
| `ki-verify` | Profile card verified badge |
| `ki-profile-circle` | Profile card role info |
| `ki-geolocation` | Profile card location |
| `ki-sms` | Profile card email |
| `ki-arrow-up` | Profile card stat trend |
| `ki-check` | Stepper completed step |

**Icon size classes:** `fs-1`, `fs-2`, `fs-3`, `fs-4`, `fs-5`, `fs-6`, `fs-2hx`, `fs-3x`

**Solid icons** (one-color, no paths needed):
```html
<i class="ki-solid ki-folder text-warning"></i>
```

---

## 5. Alert — `x-metronic.base.alert`

**Source:** `components/metronic/base/alert.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `type` | `'primary'` | `primary`, `success`, `info`, `warning`, `danger` |
| `title` | `''` | Optional bold heading inside the alert |
| `icon` | `''` | `ki-duotone` icon name |
| `dismissible` | `false` | Shows an `×` close button |
| `solid` | `false` | Solid-background style (uses `bg-{type}` with light text) |

```blade
{{-- Simple alert --}}
<x-metronic.base.alert type="success">
    Record saved successfully.
</x-metronic.base.alert>

{{-- With title and icon --}}
<x-metronic.base.alert type="warning" title="Heads Up" icon="ki-shield-tick">
    Your account subscription expires soon.
</x-metronic.base.alert>

{{-- Solid dismissible --}}
<x-metronic.base.alert type="danger" :solid="true" :dismissible="true" title="Error">
    Something went wrong. Please try again.
</x-metronic.base.alert>
```

The component internally builds:
- Standard: `alert alert-{type} d-flex align-items-center p-5`
- Solid: `alert alert-dismissible bg-{type} d-flex flex-column flex-sm-row p-5 mb-10`

---

## 6. Badge — `x-metronic.base.badge`

**Source:** `components/metronic/base/badge.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `type` | `'light'` | Full badge class suffix: `light`, `primary`, `light-primary`, `light-success`, `light-danger`, etc. |
| `color` | `'primary'` | Used when `outline=true` |
| `circle` | `false` | Adds `badge-circle` |
| `square` | `false` | Adds `badge-square` |
| `outline` | `false` | Adds `badge-outline badge-{color}` |

```blade
<x-metronic.base.badge type="primary">New</x-metronic.base.badge>
<x-metronic.base.badge type="light-success">Active</x-metronic.base.badge>
<x-metronic.base.badge type="light-danger">Inactive</x-metronic.base.badge>
<x-metronic.base.badge type="primary" :circle="true">5</x-metronic.base.badge>
<x-metronic.base.badge type="primary" :square="true">5</x-metronic.base.badge>
```

---

## 7. Modal — `x-metronic.base.modal`

**Source:** `components/metronic/base/modal.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `id` | required | Used for `data-bs-target="#id"` trigger |
| `title` | required | Modal header title |
| `size` | `''` | `sm`, `lg`, `xl`, `fullscreen` |
| `centered` | `false` | Adds `modal-dialog-centered` |
| `scrollable` | `false` | Adds `modal-dialog-scrollable` |
| `static` | `false` | Adds `data-bs-backdrop="static" data-bs-keyboard="false"` |
| `$footer` | `null` | Optional footer slot |

```blade
{{-- Trigger --}}
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
    Add User
</button>

{{-- Modal --}}
<x-metronic.base.modal id="kt_modal_add_user" title="Add User" size="lg">
    <form>
        {{-- form fields --}}
    </form>
    <x-slot:footer>
        <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot:footer>
</x-metronic.base.modal>

{{-- Static (undismissable) confirmation modal --}}
<x-metronic.base.modal
    id="kt_modal_confirm"
    title="Confirm Action"
    :centered="true"
    :static="true">
    Are you sure you want to proceed?
    <x-slot:footer>
        <button class="btn btn-light" data-bs-dismiss="modal">No</button>
        <button class="btn btn-danger">Yes, Delete</button>
    </x-slot:footer>
</x-metronic.base.modal>
```

The close button is always rendered as:
```html
<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
</div>
```

---

## 8. Tabs — `x-metronic.base.tabs`

**Source:** `components/metronic/base/tabs.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `tabs` | `[]` | Array of `['id' => 'tab1', 'label' => 'Tab 1', 'active' => true]` |
| `id` | `'myTab'` | ID used for the `tab-content` wrapper |

```blade
<x-metronic.base.tabs :tabs="[
    ['id' => 'kt_tab_overview', 'label' => 'Overview', 'active' => true],
    ['id' => 'kt_tab_settings', 'label' => 'Settings'],
    ['id' => 'kt_tab_logs', 'label' => 'Logs'],
]" id="profileTabs">
    <div class="tab-pane fade show active" id="kt_tab_overview" role="tabpanel">
        {{-- Overview content --}}
    </div>
    <div class="tab-pane fade" id="kt_tab_settings" role="tabpanel">
        {{-- Settings content --}}
    </div>
    <div class="tab-pane fade" id="kt_tab_logs" role="tabpanel">
        {{-- Logs content --}}
    </div>
</x-metronic.base.tabs>
```

Renders `nav nav-tabs nav-line-tabs mb-5 fs-6` for the `<ul>`.

---

## 9. Accordion — `x-metronic.base.accordion`

**Source:** `components/metronic/base/accordion.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `id` | `'kt_accordion_1'` | Root accordion element ID |
| `items` | `[]` | Array of `['title' => '', 'content' => '', 'show' => false]` |

Content in `items[]['content']` is rendered as raw HTML (`{!! !!}`).

```blade
<x-metronic.base.accordion id="kt_accordion_faq" :items="[
    ['title' => 'What is this?', 'content' => '<p>This is the answer.</p>', 'show' => true],
    ['title' => 'How does it work?', 'content' => '<p>It works like this...</p>'],
]" />
```

Button class: `accordion-button fs-4 fw-semibold` (+ `collapsed` when not open).
Body class: `accordion-collapse collapse` (+ `show` when open).

---

## 10. Breadcrumb — `x-metronic.base.breadcrumb`

**Source:** `components/metronic/base/breadcrumb.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `items` | `[]` | Array of `['label' => '', 'url' => '#', 'active' => false]` |
| `separator` | `'dot'` | `dot` → `breadcrumb-dot`, `line` → `breadcrumb-line`, `bullet` → `breadcrumb-separatorless` |

```blade
<x-metronic.base.breadcrumb :items="[
    ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
    ['label' => 'Users', 'url' => route('admin.users.index')],
    ['label' => 'Edit', 'active' => true],
]" separator="dot" />
```

Base class: `breadcrumb text-muted fs-6 fw-semibold`.

---

## 11. Symbol (Avatar) — `x-metronic.base.symbol`

**Source:** `components/metronic/base/symbol.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `image` | `null` | Image URL; if set, renders `<img>` |
| `label` | `null` | Fallback initial/text when no image |
| `color` | `'primary'` | Background color for label variant |
| `textColor` | `'inverse-primary'` | Text color for label variant |
| `size` | `'50px'` | Controls `symbol-{size}` class |
| `circle` | `false` | Adds `symbol-circle` |
| `square` | `false` | Adds `symbol-square` |
| `badge` | `false` | Shows a status dot badge |
| `badgeColor` | `'success'` | Color of the badge dot |

```blade
{{-- Image avatar --}}
<x-metronic.base.symbol image="{{ $user->avatar_url }}" size="50px" :circle="true" />

{{-- Initials avatar --}}
<x-metronic.base.symbol
    label="{{ strtoupper(substr($user->name, 0, 1)) }}"
    color="light-primary"
    text-color="primary"
    size="40px" />

{{-- With online badge --}}
<x-metronic.base.symbol
    image="{{ $user->avatar_url }}"
    size="50px"
    :circle="true"
    :badge="true"
    badge-color="success" />
```

---

## 12. Pagination — `x-metronic.base.pagination`

**Source:** `components/metronic/base/pagination.blade.php`

Wraps a Laravel paginator instance. Only renders when `hasPages()` is true.

```blade
<x-metronic.base.pagination :paginator="$lessons" />
```

Standard pattern (without component):

```blade
<div class="row">
    <div class="col">
        {{ $records->links() }}
    </div>
</div>
```

Renders `<ul class="pagination">` with `page-item previous`, `page-item active`, `page-item next` structure.

---

## 13. DataTable — `x-metronic.general.datatable`

**Source:** `components/metronic/general/datatable.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `id` | auto-generated `kt_datatable_{uniqid}` | Used for JS init |
| `headers` | `[]` | Array of column header strings |
| `rows` | `[]` | Array of row arrays (each cell rendered as `{!! !!}`) |
| `striped` | `false` | Adds `table-striped` |

Base table class: `table align-middle table-row-dashed fs-6 gy-5`
Header row class: `text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0`
Body class: `text-gray-600 fw-semibold`

The component auto-initializes `$(#id).DataTable()` on `DOMContentLoaded`.

```blade
<x-metronic.general.datatable
    id="kt_datatable_roles"
    :headers="['ID', 'Name', 'Permissions', 'Actions']"
    :rows="$roles->map(fn($r) => [
        $r->id,
        $r->title,
        $r->permissions->pluck('title')->join(', '),
        '<a class=\"btn btn-xs btn-primary\" href=\"/admin/roles/'.$r->id.'/edit\">Edit</a>'
    ])->toArray()"
/>
```

For manual tables in index views, use this exact pattern:

```html
<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_{resource}">
        <thead>
            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                <th class="w-10px pe-2">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox"
                            data-kt-check="true"
                            data-kt-check-target="#kt_table_{resource} .form-check-input"
                            value="1" />
                    </div>
                </th>
                <th>Column</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-semibold">
            @foreach($records as $record)
                <tr data-entry-id="{{ $record->id }}">
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="{{ $record->id }}" />
                        </div>
                    </td>
                    <td>{{ $record->name }}</td>
                    <td>{{-- action buttons --}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
```

---

## 14. Drawer — `x-metronic.general.drawer`

**Source:** `components/metronic/general/drawer.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `id` | auto-generated | Root drawer element ID |
| `width` | `'500px'` | `data-kt-drawer-width` |
| `title` | `'Drawer'` | Card header title |
| `toggle` | `''` | ID of the trigger button (without `#`) |
| `close` | `''` | Custom close button ID; defaults to `{id}_close` |

Renders as a `bg-white` div with a `card w-100 rounded-0` inside. The body uses `hover-scroll-overlay-y`.

```blade
{{-- Trigger button --}}
<button id="kt_drawer_filters_button" class="btn btn-sm btn-light-primary">
    <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i>
    Filters
</button>

{{-- Drawer --}}
<x-metronic.general.drawer
    id="kt_drawer_filters"
    title="Apply Filters"
    toggle="kt_drawer_filters_button"
    width="400px">
    <form>
        {{-- filter fields --}}
    </form>
</x-metronic.general.drawer>
```

---

## 15. Stepper — `x-metronic.general.stepper`

**Source:** `components/metronic/general/stepper.blade.php`

### Props

| Prop | Default | Notes |
|---|---|---|
| `id` | auto-generated `kt_stepper_{uniqid}` | Root element ID |
| `steps` | `[]` | Array of `['title' => '', 'desc' => '']` |

The first step gets `current` class automatically. The `$slot` contains the step content panels.

```blade
<x-metronic.general.stepper id="kt_stepper_onboard" :steps="[
    ['title' => 'Account Type', 'desc' => 'Choose your account'],
    ['title' => 'Personal Info', 'desc' => 'Your details'],
    ['title' => 'Review', 'desc' => 'Confirm and submit'],
]">
    <div class="flex-column current" data-kt-stepper-element="content">
        {{-- Step 1 content --}}
    </div>
    <div class="flex-column" data-kt-stepper-element="content">
        {{-- Step 2 content --}}
    </div>
    <div class="flex-column" data-kt-stepper-element="content">
        {{-- Step 3 content --}}
    </div>
</x-metronic.general.stepper>
```

Step nav structure: `stepper stepper-pills` → `stepper-nav flex-center flex-wrap mb-10` → `stepper-item mx-2 my-4`.
Each item has `stepper-line w-40px`, `stepper-icon w-40px h-40px` (with `stepper-check fas fa-check` + `stepper-number`), and `stepper-label` (with `stepper-title` h3 and `stepper-desc`).

JS initialization (auto-included by component):
```javascript
var stepper = new KTStepper(document.querySelector('#kt_stepper_onboard'));
```

---

## 16. Menu — `x-metronic.general.menu`

**Source:** `components/metronic/general/menu.blade.php`

Renders a Metronic dropdown menu. The trigger button must be separate.

```blade
{{-- Trigger --}}
<button type="button" class="btn btn-sm btn-light"
    data-kt-menu-trigger="click"
    data-kt-menu-placement="bottom-start">
    Options
</button>

{{-- Menu panel --}}
<x-metronic.general.menu>
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3">Edit</a>
    </div>
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3">Delete</a>
    </div>
</x-metronic.general.menu>
```

Rendered class: `menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold py-3` with `data-kt-menu="true"`.

---

## 17. Form Components

### 17.1 Input — `x-metronic.forms.input`

**Source:** `components/metronic/forms/input.blade.php`

| Prop | Default | Notes |
|---|---|---|
| `type` | `'text'` | HTML input type |
| `placeholder` | `''` | |
| `solid` | `false` | Adds `form-control-solid` |
| `transparent` | `false` | Adds `form-control-transparent` |
| `flush` | `false` | Adds `form-control-flush` |
| `size` | `''` | `sm`, `lg` |

```blade
<x-metronic.forms.input name="title" :solid="true" placeholder="Enter title" />
```

**Standard direct usage (from real edit views):**

```html
<input class="form-control form-control-solid {{ $errors->has('title') ? 'is-invalid' : '' }}"
    type="text" name="title" id="title"
    value="{{ old('title', $record->title) }}" />
@if($errors->has('title'))
    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
@endif
<div class="text-muted fs-7">{{ trans('cruds.model.fields.title_helper') }}</div>
```

### 17.2 Select2 — `x-metronic.forms.select2`

**Source:** `components/metronic/forms/select2.blade.php`

| Prop | Default | Notes |
|---|---|---|
| `id` | `null` | |
| `placeholder` | `'Select an option'` | |
| `options` | `[]` | Keyed array: `['value' => 'Label']` |
| `selected` | `null` | Single value or array for multi |
| `hideSearch` | `false` | Adds `data-hide-search="true"` |

```blade
<x-metronic.forms.select2
    name="course_id"
    placeholder="Select a course"
    :options="$courses->pluck('title', 'id')->toArray()"
    :selected="old('course_id', $lesson->course_id ?? null)" />
```

**Direct HTML (from real edit views — also valid):**

```html
<select class="form-control form-control-solid select2 {{ $errors->has('course') ? 'is-invalid' : '' }}"
    name="course_id" id="course_id" required>
    @foreach($courses as $id => $entry)
        <option value="{{ $id }}" {{ old('course_id', $record->course_id ?? '') == $id ? 'selected' : '' }}>
            {{ $entry }}
        </option>
    @endforeach
</select>
```

### 17.3 Checkbox — `x-metronic.forms.checkbox`

**Source:** `components/metronic/forms/checkbox.blade.php`

| Prop | Default | Notes |
|---|---|---|
| `id` | auto-generated | |
| `label` | `''` | |
| `checked` | `false` | |
| `value` | `'1'` | |
| `name` | `''` | |
| `custom` | `true` | Adds `form-check-custom` |
| `solid` | `true` | Adds `form-check-solid` |

```blade
<x-metronic.forms.checkbox
    name="is_published"
    label="{{ trans('cruds.lesson.fields.is_published') }}"
    :checked="old('is_published', $lesson->is_published ?? false)" />
```

**Boolean checkboxes in real views require a hidden input:**

```html
<input type="hidden" name="is_published" value="0">
<div class="form-check form-check-custom form-check-solid">
    <input class="form-check-input" type="checkbox" name="is_published" id="is_published"
        value="1" {{ $lesson->is_published || old('is_published', 0) === 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="is_published">
        {{ trans('cruds.lesson.fields.is_published') }}
    </label>
</div>
```

### 17.4 Switch — `x-metronic.forms.switch`

**Source:** `components/metronic/forms/switch.blade.php`

Same props as checkbox. Renders `form-check form-switch form-check-custom form-check-solid`.

```blade
<x-metronic.forms.switch
    name="is_active"
    label="Active"
    :checked="old('is_active', $record->is_active ?? false)" />
```

### 17.5 Flatpickr (Date Picker) — `x-metronic.forms.flatpickr`

**Source:** `components/metronic/forms/flatpickr.blade.php`

| Prop | Default | Notes |
|---|---|---|
| `id` | auto-generated `kt_datepicker_{uniqid}` | |
| `placeholder` | `'Pick a date'` | |
| `enableTime` | `false` | If true, date format becomes `Y-m-d H:i` |
| `dateFormat` | `'Y-m-d'` | |

Component auto-injects inline `<script>` initializing flatpickr via `$("#id").flatpickr({...})`.

```blade
<x-metronic.forms.flatpickr name="start_date" placeholder="Start date" />
<x-metronic.forms.flatpickr name="event_at" placeholder="Date & Time" :enable-time="true" />
```

### 17.6 Dropzone — `x-metronic.forms.dropzone`

**Source:** `components/metronic/forms/dropzone.blade.php`

| Prop | Default | Notes |
|---|---|---|
| `id` | auto-generated `kt_dropzone_{uniqid}` | |
| `action` | `'#'` | Upload URL |
| `message` | `'Drop files here or click to upload.'` | |
| `submessage` | `'Upload up to 10 files'` | |
| `maxFiles` | `10` | |
| `maxFilesize` | `10` | MB |

Component auto-includes `Dropzone` JS init with `addRemoveLinks: true`.

```blade
<x-metronic.forms.dropzone :action="route('admin.lessons.storeMedia')" :max-files="1" :max-filesize="2" />
```

**For media with existing files (seen in real edit views), use `Dropzone.options.{camelId}` in scripts:**

```javascript
Dropzone.options.thumbnailDropzone = {
    url: '{{ route('admin.lessons.storeMedia') }}',
    maxFilesize: 2,
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
    params: { size: 2, width: 4096, height: 4096 },
    success: function(file, response) {
        $('form').append('<input type="hidden" name="thumbnail[]" value="' + response.name + '">');
        uploadedMap[file.name] = response.name;
    },
    removedfile: function(file) {
        file.previewElement.remove();
        var name = file.file_name ?? uploadedMap[file.name];
        $('form').find('input[name="thumbnail[]"][value="' + name + '"]').remove();
    },
    init: function() {
        @if(isset($record) && $record->thumbnail)
            var files = {!! json_encode($record->thumbnail) !!};
            for (var i in files) {
                var file = files[i];
                this.options.addedfile.call(this, file);
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url);
                file.previewElement.classList.add('dz-complete');
                $('form').append('<input type="hidden" name="thumbnail[]" value="' + file.file_name + '">');
            }
        @endif
    }
}
```

### 17.7 Image Input — `x-metronic.forms.image-input`

**Source:** `components/metronic/forms/image-input.blade.php`

| Prop | Default | Notes |
|---|---|---|
| `avatar` | `'/assets/media/svg/avatars/blank.svg'` | Current image URL |
| `name` | `'avatar'` | Input name |

Renders three action buttons using `data-kt-image-input-action`: `change`, `cancel`, `remove`.
Each action button uses `btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow`.

```blade
<x-metronic.forms.image-input name="avatar" :avatar="$user->avatar_url" />
```

### 17.8 Repeater — `x-metronic.forms.repeater`

**Source:** `components/metronic/forms/repeater.blade.php`

| Prop | Default | Notes |
|---|---|---|
| `id` | auto-generated `kt_repeater_{uniqid}` | |
| `addLabel` | `'Add'` | Label for the add button |

Uses `data-repeater-list`, `data-repeater-item`, `data-repeater-create`, `data-repeater-delete`.
Auto-initializes via `$('#id').repeater({ initEmpty: false, show: slideDown, hide: slideUp })`.

```blade
<x-metronic.forms.repeater id="kt_repeater_contacts" add-label="Add Contact">
    <div class="form-group row">
        <div class="col-md-5">
            <label class="form-label">Name</label>
            <input type="text" name="contacts[][name]" class="form-control" />
        </div>
        <div class="col-md-5">
            <label class="form-label">Email</label>
            <input type="email" name="contacts[][email]" class="form-control" />
        </div>
        <div class="col-md-2">
            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-8">
                <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
            </a>
        </div>
    </div>
</x-metronic.forms.repeater>
```

### 17.9 Input Group — `x-metronic.forms.input-group`

**Source:** `components/metronic/forms/input-group.blade.php`

| Prop | Default | Notes |
|---|---|---|
| `text` | `''` | Prepend/append label text |
| `position` | `'prepend'` | `prepend` or `append` |
| `icon` | `''` | If set, renders a `ki-duotone` icon instead of text |

```blade
{{-- Text prefix --}}
<x-metronic.forms.input-group text="@">
    <input type="text" class="form-control" name="username" placeholder="Username" />
</x-metronic.forms.input-group>

{{-- Icon prefix --}}
<x-metronic.forms.input-group icon="ki-search" position="prepend">
    <input type="text" class="form-control" name="query" placeholder="Search..." />
</x-metronic.forms.input-group>
```

---

## 18. Form Field Structure (from Real Edit Views)

Every form field must follow this exact wrapper pattern:

```html
<div class="fv-row mb-7">
    <label class="required fs-6 fw-semibold mb-2" for="field_id">
        {{ trans('cruds.model.fields.field_name') }}
    </label>
    <input class="form-control form-control-solid {{ $errors->has('field_name') ? 'is-invalid' : '' }}"
        type="text"
        name="field_name"
        id="field_id"
        value="{{ old('field_name', $record->field_name ?? '') }}" />
    @if($errors->has('field_name'))
        <div class="invalid-feedback">{{ $errors->first('field_name') }}</div>
    @endif
    <div class="text-muted fs-7">{{ trans('cruds.model.fields.field_name_helper') }}</div>
</div>
```

Key rules:
- Wrapper: `fv-row mb-7` (required for FormValidation.js)
- Label class: `required fs-6 fw-semibold mb-2` (remove `required` when field is optional)
- Input class: `form-control form-control-solid` + conditional `is-invalid`
- Helper text: `text-muted fs-7` below the field
- Textarea uses `form-control form-control-solid` exactly like inputs

Form wrapper:

```html
<form method="POST" action="{{ route('admin.model.update', [$record->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    {{-- fields --}}
    <div class="fv-row mb-7">
        <button class="btn btn-primary" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form>
```

---

## 19. Widget Components

### Stats Widget — `x-metronic.stats-widget`

**Source:** `components/metronic/stats-widget.blade.php`

| Prop | Required | Notes |
|---|---|---|
| `title` | yes | Label text link |
| `value` | yes | Main metric value (rendered in `text-{color}`) |
| `description` | yes | Sub-description text |
| `color` | `'primary'` | Bootstrap color for the value |
| `flush` | `false` | Adds `card-flush` |

```blade
<x-metronic.stats-widget
    title="Total Revenue"
    value="$124,500"
    description="Compared to last month"
    color="success" />
```

### Profile Card — `x-metronic.profile-card`

**Source:** `components/metronic/profile-card.blade.php`

Shows a full user profile header with avatar, name, role, location, email, stats, and a progress bar.

| Prop | Required | Notes |
|---|---|---|
| `name` | yes | |
| `role` | yes | |
| `email` | yes | |
| `location` | yes | |
| `avatar` | yes | Image URL |
| `stats` | `[]` | Array of `['label'=>'', 'value'=>0, 'icon'=>'ki-arrow-up', 'color'=>'success', 'prefix'=>'']` |
| `completeness` | `50` | Profile completion percentage 0–100 |

```blade
<x-metronic.profile-card
    name="{{ $user->name }}"
    role="{{ $user->roles->first()->title ?? 'Member' }}"
    email="{{ $user->email }}"
    location="{{ $user->location ?? 'N/A' }}"
    avatar="{{ $user->avatar_url }}"
    :completeness="$user->profile_completeness"
    :stats="[
        ['label' => 'Earnings', 'value' => 4500, 'icon' => 'ki-arrow-up', 'color' => 'success', 'prefix' => '$'],
        ['label' => 'Projects', 'value' => 75, 'icon' => 'ki-arrow-up', 'color' => 'primary'],
        ['label' => 'Tasks', 'value' => 65, 'icon' => 'ki-arrow-down', 'color' => 'danger'],
    ]" />
```

Stat numbers use `data-kt-countup="true"` for animated counting on load.

---

## 20. ID Naming Convention

All interactive elements must use the `kt_` prefix:

| Element | Pattern | Example |
|---|---|---|
| DataTable | `kt_table_{resource}` | `kt_table_users` |
| Modal | `kt_modal_{action}` | `kt_modal_create_user` |
| Form | `kt_form_{name}` | `kt_form_profile` |
| Accordion | `kt_accordion_{n}` | `kt_accordion_1` |
| Datepicker | `kt_datepicker_{n}` | `kt_datepicker_1` |
| Dropzone | `kt_dropzone_{n}` | `kt_dropzone_thumbnail` |
| Repeater | `kt_repeater_{n}` | `kt_repeater_contacts` |
| Drawer | `kt_drawer_{name}` | `kt_drawer_filters` |
| Stepper | `kt_stepper_{name}` | `kt_stepper_onboard` |

---

## 21. Authorization Gates

Always gate all CRUD UI behind `@can`:

```blade
@can('lesson_create')
    <a class="btn btn-success" href="{{ route('admin.lessons.create') }}">
        {{ trans('global.add') }} {{ trans('cruds.lesson.title_singular') }}
    </a>
@endcan
```

---

## 22. Translation Keys

Always use `trans()` for all user-facing text:

```blade
{{ trans('global.add') }}         {{-- Add --}}
{{ trans('global.edit') }}        {{-- Edit --}}
{{ trans('global.delete') }}      {{-- Delete --}}
{{ trans('global.view') }}        {{-- View --}}
{{ trans('global.save') }}        {{-- Save --}}
{{ trans('global.list') }}        {{-- List --}}
{{ trans('global.areYouSure') }}  {{-- used in onsubmit confirm() --}}
{{ trans('global.app_csvImport') }}

{{-- Model-specific --}}
{{ trans('cruds.{model}.title_singular') }}
{{ trans('cruds.{model}.title') }}
{{ trans('cruds.{model}.fields.{field}') }}
{{ trans('cruds.{model}.fields.{field}_helper') }}
```

---

## 23. Core Architectural Rules

1. **All content belongs inside `x-metronic.card`** — never render raw page content outside a card.
2. **All form field rows must use `.fv-row.mb-7`** — required for FormValidation.js row targeting.
3. **All icon spans must be included** — `ki-duotone` icons without `<span class="pathN">` children will not render.
4. **All IDs must use `kt_` prefix** — Metronic JS plugins (DataTable, Stepper, Drawer, etc.) rely on this.
5. **All inputs inside cards use `form-control-solid`** — plain `form-control` is only for non-card contexts.
6. **Boolean checkboxes need a hidden `value="0"` input** above them to correctly POST false.
7. **Tables must always be wrapped** in `<div class="table-responsive">`.
8. **Scripts go in `@section('scripts') @parent`** — never inline `<script>` in the content section.
9. **All CRUD buttons must be inside `@can` gates** — never render action links without authorization checks.
10. **Never use raw inline styles** — the only exception is chart container height (`style="height: 350px;"`).
11. **Always ask for layout preference** — before creating any views, proactively ask the user what kind of layout they want for all views to create.
