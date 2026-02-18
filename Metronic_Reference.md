# Metronic UI Technical Reference

This document contains technical details for implementing Metronic UI components.

## Table of Contents
- [Base](#base)
- [Forms](#forms)
- [Charts](#charts)
- [General](#general)
- [Editors](#editors)

---

### Accordion

#### Basic
```html
<!--begin::Accordion-->
<div class="accordion" id="kt_accordion_1">
    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_1">
            <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                Accordion Item #1
            </button>
        </h2>
        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_2">
            <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                Accordion Item #2
            </button>
        </h2>
        <div id="kt_accordion_1_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_3">
            <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                Accordion Item #3
            </button>
        </h2>
        <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>
</div>
<!--end::Accordion-->
```

#### Initialization
Automated via `data-bs-toggle="collapse"`. No specific JS initialization required unless using API.

### Alerts

#### Basic
```html
<!--begin::Alert-->
<div class="alert alert-primary d-flex align-items-center p-5">
    <!--begin::Icon-->
    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
    <!--end::Icon-->
    <!--begin::Wrapper-->
    <div class="d-flex flex-column">
        <!--begin::Title-->
        <h4 class="mb-1 text-dark">This is an alert</h4>
        <!--end::Title-->
        <!--begin::Content-->
        <span>The alert component can be used to highlight certain parts of your page for higher content visibility.</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert-->
```

#### Solid Colors (Dismissible)
```html
<!--begin::Alert-->
<div class="alert alert-dismissible bg-primary d-flex flex-column flex-sm-row p-5 mb-10">
    <!--begin::Icon-->
    <i class="ki-duotone ki-search-list fs-2hx text-light me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    <!--end::Icon-->
    <!--begin::Wrapper-->
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <!--begin::Title-->
        <h4 class="mb-2 light">This is an alert</h4>
        <!--end::Title-->
        <!--begin::Content-->
        <span>The alert component can be used to highlight certain parts of your page for higher content visibility.</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Close-->
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span class="path2"></span></i>
    </button>
    <!--end::Close-->
</div>
<!--end::Alert-->
```

### Badges

#### Basic & Light
```html
<span class="badge badge-light">New</span>
<span class="badge badge-primary">New</span>
<span class="badge badge-light-primary">New</span>
<span class="badge badge-square badge-primary">5</span>
<span class="badge badge-circle badge-primary">5</span>
```

### Breadcrumb

#### Basic
```html
<ol class="breadcrumb text-muted fs-6 fw-semibold">
    <li class="breadcrumb-item"><a href="#" class="">Home</a></li>
    <li class="breadcrumb-item"><a href="#" class="">Library</a></li>
    <li class="breadcrumb-item text-muted">Active</li>
</ol>
```

#### Separators
Use `.breadcrumb-line` or `.breadcrumb-dot`.
```html
<ol class="breadcrumb breadcrumb-line text-muted fs-6 fw-semibold">...</ol>
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-semibold">...</ol>
```

### Buttons

#### Base Style
```html
<a href="#" class="btn btn-primary">Primary</a>
<a href="#" class="btn btn-secondary">Secondary</a>
<a href="#" class="btn btn-success">Success</a>
<a href="#" class="btn btn-info">Info</a>
<a href="#" class="btn btn-warning">Warning</a>
<a href="#" class="btn btn-danger">Danger</a>
<a href="#" class="btn btn-dark">Dark</a>
```

#### Light Style
```html
<a href="#" class="btn btn-light-primary">Primary</a>
<a href="#" class="btn btn-light-success">Success</a>
<a href="#" class="btn btn-light-danger">Danger</a>
```

#### Outline Dashed Style
```html
<a href="#" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary">Primary</a>
<a href="#" class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">Danger</a>
```

#### Hover Effects
```html
<a href="#" class="btn btn-primary hover-elevate-up">Elevate up</a>
<a href="#" class="btn btn-primary hover-elevate-down">Elevate down</a>
<a href="#" class="btn btn-danger hover-scale">Scale</a>
```

#### Sizes
```html
<a href="#" class="btn btn-primary btn-xs">Tiny</a>
<a href="#" class="btn btn-primary btn-sm">Small</a>
<a href="#" class="btn btn-primary">Default</a>
<a href="#" class="btn btn-primary btn-lg">Large</a>
```

#### With Icons
```html
<!-- Icon + Text -->
<a href="#" class="btn btn-primary">
    <i class="ki-duotone ki-chart-simple-2 fs-2">
        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
    </i>
    Caption
</a>

<!-- Icon Only -->
<a href="#" class="btn btn-icon btn-primary">
    <i class="ki-duotone ki-chart-simple-2 fs-2">
        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
    </i>
</a>
```

#### Active & Disabled States
```html
<!-- Active -->
<a href="#" class="btn btn-primary active">Active</a>

<!-- Disabled -->
<button type="button" class="btn btn-primary" disabled="disabled">Disabled</button>
```


### Cards

#### Basic
```html
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Title</h3>
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm btn-light">
                Action
            </button>
        </div>
    </div>
    <div class="card-body">
        Lorem Ipsum is simply dummy text...
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
```

#### Flush (No borders/padding)
Use `.card-flush`.

### Carousel

#### Basic with Dots
```html
<div id="kt_carousel_1_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
    <!--begin::Heading-->
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <!--begin::Label-->
        <span class="fs-4 fw-bold pe-2">Title</span>
        <!--end::Label-->
        <!--begin::Carousel Indicators-->
        <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
            <li data-bs-target="#kt_carousel_1_carousel" data-bs-slide-to="0" class="ms-1 active"></li>
            <li data-bs-target="#kt_carousel_1_carousel" data-bs-slide-to="1" class="ms-1"></li>
            <li data-bs-target="#kt_carousel_1_carousel" data-bs-slide-to="2" class="ms-1"></li>
        </ol>
        <!--end::Carousel Indicators-->
    </div>
    <!--end::Heading-->
    <!--begin::Carousel-->
    <div class="carousel-inner pt-8">
        <!--begin::Item-->
        <div class="carousel-item active">
            ...
        </div>
        <!--end::Item-->
        <!--begin::Item-->
        <div class="carousel-item">
            ...
        </div>
        <!--end::Item-->
    </div>
    <!--end::Carousel-->
</div>
```

### Modal

#### Basic
```html
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modal title</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
```

### Pagination

#### Basic
```html
<ul class="pagination">
    <li class="page-item previous disabled"><a href="#" class="page-link"><i class="previous"></i></a></li>
    <li class="page-item "><a href="#" class="page-link">1</a></li>
    <li class="page-item active"><a href="#" class="page-link">2</a></li>
    <li class="page-item "><a href="#" class="page-link">3</a></li>
    <li class="page-item "><a href="#" class="page-link">4</a></li>
    <li class="page-item "><a href="#" class="page-link">5</a></li>
    <li class="page-item "><a href="#" class="page-link">6</a></li>
    <li class="page-item next"><a href="#" class="page-link"><i class="next"></i></a></li>
</ul>
```

### Bullets
```html
<span class="bullet"></span>
<span class="bullet bullet-dot"></span>
<span class="bullet bullet-vertical"></span>
<span class="bullet bg-primary"></span>
```

### Indicator
```html
<button class="btn btn-primary" data-kt-indicator="on">
    <span class="indicator-label">Submit</span>
    <span class="indicator-progress">
        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
</button>
```

### Overlay
```html
<div class="card overlay">
    <div class="card-body p-0">
        <div class="overlay-wrapper">
            <img src="..." class="w-100 rounded"/>
        </div>
        <div class="overlay-layer bg-dark bg-opacity-25">
             <a href="#" class="btn btn-primary">Action</a>
        </div>
    </div>
</div>
```

### Popovers
```html
<button type="button" class="btn btn-primary" data-bs-toggle="popover" title="Popover title" data-bs-content="Popover body content">
    Click me
</button>
```

### Pulse
```html
<a href="#" class="btn btn-icon btn-light pulse">
    <i class="ki-duotone ki-element-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
    <span class="pulse-ring"></span>
</a>
```

### Rating
```html
<div class="rating">
    <div class="rating-label checked">
        <i class="ki-duotone ki-star fs-1"></i>
    </div>
    <div class="rating-label checked">
        <i class="ki-duotone ki-star fs-1"></i>
    </div>
    <div class="rating-label checked">
        <i class="ki-duotone ki-star fs-1"></i>
    </div>
    <div class="rating-label">
        <i class="ki-duotone ki-star fs-1"></i>
    </div>
    <div class="rating-label">
        <i class="ki-duotone ki-star fs-1"></i>
    </div>
</div>
```

### Ribbon
```html
<div class="card card-bordered">
    <div class="card-header ribbon ribbon-top">
        <div class="ribbon-label bg-primary">Ribbon</div>
        <div class="card-title">Ribbon Example</div>
    </div>
    <div class="card-body">
        ...
    </div>
</div>
```

### Separator
```html
<div class="separator my-10"></div>
<div class="separator border-primary my-10"></div>
<div class="separator separator-dashed my-10"></div>
<div class="separator separator-dotted my-10"></div>
```

### Symbol (Avatar)
```html
<div class="symbol symbol-50px">
    <img src="..." alt=""/>
</div>
<!-- With Label -->
<div class="symbol symbol-50px">
    <div class="symbol-label fs-2 fw-semibold text-primary">A</div>
</div>
```

### Toasts
```html
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="me-auto">Title</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
    </div>
</div>
```

### Tooltips
```html
<button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
    Tooltip
</button>
```

### Tabs

#### Line Tabs
```html
<ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Link 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Link 2</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Link 3</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
        ...
    </div>
    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
        ...
    </div>
    <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
        ...
    </div>
</div>
```


### Page Loading
```html
<!-- Basic -->
<div class="page-loader">
    <span class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </span>
</div>

<!-- With Message -->
<div class="page-loader flex-column">
    <span class="spinner-border text-primary" role="status"></span>
    <span class="text-muted fs-6 fw-semibold mt-5">Loading...</span>
</div>

<!-- On Body Initialization -->
<body class="app-default" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on">
    <div class="page-loader">
        <span class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </span>
    </div>
</body>
```
```javascript
// Show
KTApp.showPageLoading();
// Hide
KTApp.hidePageLoading();
```

### Tables

#### Basic & Bordered
```html
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="fw-bold fs-6 text-gray-800">
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>,800</td>
            </tr>
        </tbody>
    </table>
</div>
```

### Forms

#### Autosize Textarea
```html
<textarea class="form-control" data-kt-autosize="true"></textarea>
```

#### Flatpickr (Datepicker)
```html
<!-- Basic -->
<input class="form-control" placeholder="Pick a date" id="kt_datepicker_1"/>

<!-- DateTime -->
<input class="form-control" placeholder="Pick date & time" id="kt_datepicker_3"/>
```

```javascript
// Basic
.flatpickr();

// DateTime
.flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});
```

#### Inputmask
```javascript
// Date
Inputmask({ "mask" : "99/99/9999" }).mask("#kt_inputmask_1");
// Phone
Inputmask({ "mask" : "(999) 999-9999" }).mask("#kt_inputmask_2");
// Email
Inputmask({
    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
    greedy: false,
    onBeforePaste: function (pastedValue, opts) {
        pastedValue = pastedValue.toLowerCase();
        return pastedValue.replace("mailto:", "");
    },
    definitions: {
        "*": {
            validator: '[0-9A-Za-z!#$%&"*+/=?^_`{|}~-]',
            cardinality: 1,
            casing: "lower"
        }
    }
}).mask("#kt_inputmask_8");
```

#### Select2
```html
<select class="form-select" data-control="select2" data-placeholder="Select an option">
    <option></option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
</select>
```

#### Tagify
```javascript
var input = document.querySelector("#kt_tagify_1");
new Tagify(input);
```

#### Bootstrap Maxlength
```javascript
$('#kt_docs_maxlength_basic').maxlength({
    warningClass: "badge badge-warning",
    limitReachedClass: "badge badge-success"
});
```

#### Clipboard
```html
<button class="btn btn-light-primary" data-clipboard-target="#kt_clipboard_1">Copy</button>
<input id="kt_clipboard_1" type="text" class="form-control" value="name@example.com" />
```
```javascript
var clipboard = new ClipboardJS('[data-clipboard-target]');
clipboard.on('success', function(e) {
    e.clearSelection();
    // Show success message
});
```

#### Controls (Base)
```html
<!-- Floating Label -->
<div class="form-floating mb-7">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"/>
    <label for="floatingInput">Email address</label>
</div>

<!-- Input Group -->
<div class="input-group mb-5">
    <span class="input-group-text" id="basic-addon1">@</span>
    <input type="text" class="form-control" placeholder="Username" aria-label="Username" />
</div>

<!-- Switch -->
<div class="form-check form-switch form-check-custom form-check-solid">
    <input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault"/>
    <label class="form-check-label" for="flexSwitchDefault">
        Default switch
    </label>
</div>
```

#### Date Range Picker
```javascript
$("#kt_daterangepicker_1").daterangepicker();

// With Time
$("#kt_daterangepicker_2").daterangepicker({
    timePicker: true,
    startDate: moment().startOf("hour"),
    endDate: moment().startOf("hour").add(32, "hour"),
    locale: {
        format: "M/DD hh:mm A"
    }
});
```

#### Dialer
```html
<div class="input-group w-md-300px"
    data-kt-dialer="true"
    data-kt-dialer-min="1000"
    data-kt-dialer-max="50000"
    data-kt-dialer-step="1000"
    data-kt-dialer-prefix="$">
    <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="decrease">
        <i class="ki-duotone ki-minus fs-2"></i>
    </button>
    <input type="text" class="form-control" readonly placeholder="Amount" value="$10000" data-kt-dialer-control="input"/>
    <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="increase">
        <i class="ki-duotone ki-plus fs-2"></i>
    </button>
</div>
```

#### DropzoneJS
```html
<form class="form" action="#" method="post">
    <div class="dropzone" id="kt_dropzonejs_example_1">
        <div class="dz-message needsclick">
            <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
            <div class="ms-4">
                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
            </div>
        </div>
    </div>
</form>
```
```javascript
var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
    url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 10,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    accept: function(file, done) {
        if (file.name == "justinbieber.jpg") {
            done("Naha, you don't.");
        } else {
            done();
        }
    }
});
```

#### Form Repeater
```html
<div id="kt_docs_repeater_basic">
    <div class="form-group">
        <div data-repeater-list="kt_docs_repeater_basic">
            <div data-repeater-item>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-label">Name:</label>
                        <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" />
                    </div>
                    <div class="col-md-4">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                            <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group mt-5">
        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
            <i class="ki-duotone ki-plus fs-3"></i> Add
        </a>
    </div>
</div>
```
```javascript
$('#kt_docs_repeater_basic').repeater({
    initEmpty: false,
    defaultValues: {
        'text-input': 'foo'
    },
    show: function () {
        $(this).slideDown();
    },
    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});
```

#### Image Input
```html
<div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/assets/media/svg/avatars/blank.svg)">
    <div class="image-input-wrapper w-125px h-125px"></div>
    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="change"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Change avatar">
        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
        <input type="hidden" name="avatar_remove" />
    </label>
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="cancel"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Cancel avatar">
        <i class="ki-duotone ki-cross fs-3"><span class="path1"></span><span class="path2"></span></i>
    </span>
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="remove"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Remove avatar">
        <i class="ki-duotone ki-cross fs-3"><span class="path1"></span><span class="path2"></span></i>
    </span>
</div>
```

#### Multiselectsplitter
```html
<select id="kt_multiselectsplitter_example_1" multiple="multiple">
    <optgroup label="Category 1">
        <option value="1">Choice 1</option>
        <option value="2">Choice 2</option>
    </optgroup>
    <optgroup label="Category 2">
        <option value="5">Choice 5</option>
        <option value="6">Choice 6</option>
    </optgroup>
</select>
```
```javascript
$("#kt_multiselectsplitter_example_1").multiselectsplitter();
```

#### noUiSlider
```html
<div id="kt_slider_basic"></div>
```
```javascript
var slider = document.querySelector("#kt_slider_basic");
noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        "min": 0,
        "max": 100
    }
});
```

#### Password Meter
```html
<div class="position-relative mb-3" data-kt-password-meter="true">
    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off" />
    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
        <i class="ki-duotone ki-eye-slash fs-2"></i>
        <i class="ki-duotone ki-eye fs-2 d-none"></i>
    </span>
</div>
<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
</div>
```

#### reCAPTCHA
```html
<form action="?" method="POST">
    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
    <br/>
    <input type="submit" value="Submit">
</form>
<script src="https://www.google.com/recaptcha/api.js"></script>
```

#### Tempus Dominus Datepicker
```html
<div class="input-group" id="kt_td_picker_basic" data-td-target-input="nearest" data-td-target-toggle="nearest">
    <input id="kt_td_picker_basic_input" type="text" class="form-control" data-td-target="#kt_td_picker_basic"/>
    <span class="input-group-text" data-td-target="#kt_td_picker_basic" data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
</div>
```
```javascript
new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"), {
    //put your config here
});
```
```html
<input class="form-control" value="tag1, tag2, tag3" id="kt_tagify_1"/>
```

#### FormValidation
```javascript
FormValidation.formValidation(
    document.getElementById('kt_form_1'),
    {
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            // ...
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    }
);
```

### Charts

#### ApexCharts
```html
<div id="kt_apexcharts_1" style="height: 350px;"></div>
```
```javascript
var element = document.getElementById('kt_apexcharts_1');
var chart = new ApexCharts(element, {
    series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    // ... options
});
chart.render();
```

#### ChartJS
```html
<canvas id="kt_chartjs_1" class="mh-400px"></canvas>
```
```javascript
var ctx = document.getElementById('kt_chartjs_1');
var config = {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar'],
        datasets: [...]
    },
    options: {
        responsive: true,
        // ...
    }
};
var myChart = new Chart(ctx, config);
```

### General Components

#### Menu
```html
<!-- Trigger -->
<button type="button" class="btn btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
    Menu
</button>

<!-- Menu -->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3">
            Menu Item 1
        </a>
    </div>
</div>
```

#### Drawer
```html
<!-- Trigger -->
<button id="kt_drawer_example_basic_button" class="btn btn-primary">Toggle Drawer</button>

<!-- Drawer -->
<div id="kt_drawer_example_basic" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_drawer_example_basic_button" data-kt-drawer-close="#kt_drawer_example_basic_close" data-kt-drawer-width="500px">
    <div class="card w-100 rounded-0">
        <div class="card-header pe-5">
            <div class="card-title">Drawer Title</div>
            <div class="card-toolbar">
                <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_example_basic_close">
                    <i class="ki-duotone ki-cross fs-2"></i>
                </div>
            </div>
        </div>
        <div class="card-body hover-scroll-overlay-y">
            ...
        </div>
    </div>
</div>
```

#### Scroll
```html
<div class="scroll h-400px px-5">
    ... content ...
</div>
```

#### SweetAlert
```javascript
Swal.fire({
    text: "Here's a basic example of SweetAlert!",
    icon: "success",
    buttonsStyling: false,
    confirmButtonText: "Ok, got it!",
    customClass: {
        confirmButton: "btn btn-primary"
    }
});
```

#### BlockUI
```javascript
var target = document.querySelector("#kt_block_ui_target");
var blockUI = new KTBlockUI(target, {
    message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
});
blockUI.block();
blockUI.release();
```

#### Cookie
```javascript
KTCookie.set("name", "value", { expires: 7 }); // 7 days
var value = KTCookie.get("name");
KTCookie.remove("name");
```

#### CountUp
```html
<div data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
```

#### Cropper
```html
<img id="image" src="image.jpg" alt="Picture">
```
```javascript
var image = document.getElementById('image');
var cropper = new Cropper(image, {
  aspectRatio: 16 / 9,
  crop(event) {
    console.log(event.detail.x);
    console.log(event.detail.y);
  },
});
```

#### DataTables
```html
<table id="kt_datatable_example_1" class="table table-row-bordered gy-5">
    <thead>
        <tr class="fw-semibold fs-6 text-muted">
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>,800</td>
        </tr>
    </tbody>
</table>
```
```javascript
$("#kt_datatable_example_1").DataTable();
```

#### Draggable
```javascript
var containers = document.querySelectorAll('.draggable-zone');
if (containers.length === 0) {
    return false;
}
var swappable = new Sortable.default(containers, {
    draggable: '.draggable',
    handle: '.draggable-handle',
    swapAnimation: {
        duration: 200,
        easingFunction: 'ease-in-out',
    },
    plugins: [Plugins.SwapAnimation]
});
```

#### Fullcalendar
```html
<div id="kt_docs_fullcalendar_basic"></div>
```
```javascript
var element = document.getElementById("kt_docs_fullcalendar_basic");
var calendar = new FullCalendar.Calendar(element, {
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    initialDate: '2020-09-12',
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectMirror: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
        {
            title: 'All Day Event',
            start: '2020-09-01'
        },
    ]
});
calendar.render();
```

#### Fullscreen Lightbox
```html
<a class="d-block overlay" data-fslightbox="lightbox-basic" href="image.jpg">
    <div class="overlay-wrapper">
        <img src="image.jpg" alt="">
    </div>
    <div class="overlay-layer">
        <i class="bi bi-eye-fill fs-3x"></i>
    </div>
</a>
```

#### jKanban Board
```html
<div id="kt_docs_jkanban_basic"></div>
```
```javascript
var kanban = new jKanban({
    element: '#kt_docs_jkanban_basic',
    gutter: '0',
    widthBoard: '250px',
    boards: [{
            'id': '_inprocess',
            'title': 'In Process',
            'item': [{
                    'title': '<span class="fw-bold">You can drag me too</span>'
                },
                {
                    'title': '<span class="fw-bold">Buy Milk</span>'
                }
            ]
        }, {
            'id': '_working',
            'title': 'Working',
            'item': [{
                    'title': '<span class="fw-bold">Do Something!</span>'
                },
                {
                    'title': '<span class="fw-bold">Run?</span>'
                }
            ]
        }, {
            'id': '_done',
            'title': 'Done',
            'item': [{
                    'title': '<span class="fw-bold">All right</span>'
                },
                {
                    'title': '<span class="fw-bold">Ok!</span>'
                }
            ]
        }
    ]
});
```

#### jsTree
```html
<div id="kt_docs_jstree_basic">
    <ul>
        <li>Root node 1
            <ul>
                <li data-jstree='{ "selected" : true }'>Initially selected</li>
                <li data-jstree='{ "icon" : "flaticon2-gear text-success" }'>custom icon URL</li>
                <li data-jstree='{ "opened" : true }'>initially open
                    <ul>
                        <li data-jstree='{ "disabled" : true }'>Disabled Node</li>
                        <li data-jstree='{ "type" : "file" }'>Another node</li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
```
```javascript
$('#kt_docs_jstree_basic').jstree({
    "core" : {
        "themes" : {
            "responsive": false
        }
    },
    "types" : {
        "default" : {
            "icon" : "ki-solid ki-folder text-warning"
        },
        "file" : {
            "icon" : "ki-solid ki-file text-primary"
        }
    },
    "plugins": ["types"]
});
```

#### Lozad (Lazy Loading)
```html
<img class="lozad" data-src="image.jpg" />
```
```javascript
const observer = lozad();
observer.observe();
```

#### Scrolltop
```html
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-duotone ki-arrow-up">
        <span class="path1"></span>
        <span class="path2"></span>
    </i>
</div>
```

#### Smooth Scroll
```html
<a href="#target_element" data-kt-scroll-toggle="true" data-kt-scroll-offset="50">
    Scroll to Target
</a>
<div id="target_element"></div>
```

#### Stepper
```html
<div class="stepper stepper-pills" id="kt_stepper_example_basic">
    <div class="stepper-nav flex-center flex-wrap mb-10">
        <div class="stepper-item mx-2 my-4 current" data-kt-stepper-element="nav">
            <div class="stepper-line w-40px"></div>
            <div class="stepper-icon w-40px h-40px">
                <i class="stepper-check fas fa-check"></i>
                <span class="stepper-number">1</span>
            </div>
            <div class="stepper-label">
                <h3 class="stepper-title">Step 1</h3>
                <div class="stepper-desc">Description</div>
            </div>
        </div>
        <!-- More steps... -->
    </div>
    <div class="mb-5">
        <div class="flex-column current" data-kt-stepper-element="content">
            <!-- Step 1 Content -->
        </div>
        <!-- More step contents... -->
    </div>
</div>
```
```javascript
var element = document.querySelector("#kt_stepper_example_basic");
var stepper = new KTStepper(element);
stepper.on("kt.stepper.next", function (stepper) {
    stepper.goNext();
});
stepper.on("kt.stepper.previous", function (stepper) {
    stepper.goPrevious();
});
```

#### Sticky
```html
<div data-kt-sticky="true" data-kt-sticky-name="docs-sticky-summary" data-kt-sticky-offset="{default: false, xl: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
    ... Content ...
</div>
```

#### Swapper
```html
<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#parent_1', lg: '#parent_2'}">
    ... Content to swap ...
</div>
```

#### Tiny Slider
```html
<div class="tns" style="direction: ltr">
    <div data-tns="true" data-tns-nav-position="bottom" data-tns-mouse-drag="true" data-tns-controls="false">
        <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">Item 1</div>
        <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">Item 2</div>
        <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">Item 3</div>
    </div>
</div>
```

#### Toastr
```javascript
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toastr-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
toastr.success("Success message", "Success Title");
toastr.error("Error message", "Error Title");
```

#### Toggle
```html
<button class="btn btn-primary" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="#kt_toggle_target" data-kt-toggle-name="toggle_example">
    Toggle
</button>
<div id="kt_toggle_target">Target Content</div>
```

#### Typed.js
```javascript
var typed = new Typed("#kt_typedjs_example", {
    strings: ["First sentence.", "Second sentence."],
    typeSpeed: 30
});
```
```html
<span id="kt_typedjs_example"></span>
```

#### Vis-Timeline
```html
<div id="kt_docs_vistimeline_basic"></div>
```
```javascript
var container = document.getElementById("kt_docs_vistimeline_basic");
var items = new vis.DataSet([
    { id: 1, content: "item 1", start: "2014-04-20" },
    { id: 2, content: "item 2", start: "2014-04-14" },
]);
var options = {};
var timeline = new vis.Timeline(container, items, options);
```
