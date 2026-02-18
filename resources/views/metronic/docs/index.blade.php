@extends('layouts.metronic')

@section('page_title', 'Metronic Components')

@section('breadcrumbs')
    <x-metronic.base.breadcrumb :items="[
        ['label' => 'Home', 'url' => '#'],
        ['label' => 'Components', 'active' => true]
    ]" separator="bullet" />
@endsection

@section('content')
<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <div class="card card-xl-stretch mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Metronic Components Documentation</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Reference and examples for all blade components</span>
                </h3>
            </div>
            <div class="card-body py-3">

                {{-- Base Components --}}
                <div class="mb-10">
                    <h2 class="mb-5">Base Components</h2>
                    <div id="base-components">
                        {{-- Alert Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Alert</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.base.alert type="primary" title="Primary Alert" icon="ki-shield-tick">
                                    This is a primary alert with an icon and title.
                                </x-metronic.base.alert>
                                <div class="separator my-5"></div>
                                <x-metronic.base.alert type="danger" solid="true" dismissible="true" title="Solid Danger Alert">
                                    This is a solid danger alert that is dismissible.
                                </x-metronic.base.alert>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.alert type="primary" title="Primary Alert" icon="ki-shield-tick"&gt;
    This is a primary alert with an icon and title.
&lt;/x-metronic.base.alert&gt;

&lt;x-metronic.base.alert type="danger" solid="true" dismissible="true" title="Solid Danger Alert"&gt;
    This is a solid danger alert that is dismissible.
&lt;/x-metronic.base.alert&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Badge Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Badge</h3>
                            <div class="rounded border p-5 mb-5 d-flex gap-2 flex-wrap">
                                <x-metronic.base.badge type="primary">Primary</x-metronic.base.badge>
                                <x-metronic.base.badge type="success">Success</x-metronic.base.badge>
                                <x-metronic.base.badge type="light-warning">Light Warning</x-metronic.base.badge>
                                <x-metronic.base.badge type="circle" color="danger">5</x-metronic.base.badge>
                                <x-metronic.base.badge outline="true" color="info">Outline Info</x-metronic.base.badge>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.badge type="primary"&gt;Primary&lt;/x-metronic.base.badge&gt;
&lt;x-metronic.base.badge type="light-warning"&gt;Light Warning&lt;/x-metronic.base.badge&gt;
&lt;x-metronic.base.badge type="circle" color="danger"&gt;5&lt;/x-metronic.base.badge&gt;
&lt;x-metronic.base.badge outline="true" color="info"&gt;Outline Info&lt;/x-metronic.base.badge&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Button Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Button</h3>
                            <div class="rounded border p-5 mb-5 d-flex gap-2 flex-wrap">
                                <x-metronic.base.button type="primary" text="Primary Button" />
                                <x-metronic.base.button type="success" outline="true" text="Outline Success" />
                                <x-metronic.base.button type="danger" dashed="true" outline="true" text="Dashed Danger" />
                                <x-metronic.base.button type="info" icon="ki-home" text="With Icon" />
                                <x-metronic.base.button type="warning" icon="ki-star" />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.button type="primary" text="Primary Button" /&gt;
&lt;x-metronic.base.button type="success" outline="true" text="Outline Success" /&gt;
&lt;x-metronic.base.button type="info" icon="ki-home" text="With Icon" /&gt;
&lt;x-metronic.base.button type="warning" icon="ki-star" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Breadcrumb Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Breadcrumb</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.base.breadcrumb :items="[
                                    ['label' => 'Home', 'url' => '#'],
                                    ['label' => 'Library', 'url' => '#'],
                                    ['label' => 'Data', 'active' => true]
                                ]" separator="dot" />
                                <div class="separator my-5"></div>
                                <x-metronic.base.breadcrumb :items="[
                                    ['label' => 'Home', 'url' => '#'],
                                    ['label' => 'Library', 'url' => '#'],
                                    ['label' => 'Data', 'active' => true]
                                ]" separator="bullet" />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.breadcrumb :items="[
    ['label' => 'Home', 'url' => '#'],
    ['label' => 'Library', 'url' => '#'],
    ['label' => 'Data', 'active' => true]
]" separator="dot" /&gt;

&lt;x-metronic.base.breadcrumb :items="..." separator="bullet" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Modal Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Modal</h3>
                            <div class="rounded border p-5 mb-5">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Launch demo modal
                                </button>

                                <x-metronic.base.modal id="exampleModal" title="Modal Title" centered="true">
                                    <p>Modal body text goes here.</p>
                                    <x-slot name="footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </x-slot>
                                </x-metronic.base.modal>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;!-- Trigger button --&gt;
&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"&gt;Launch demo modal&lt;/button&gt;

&lt;!-- Modal Component --&gt;
&lt;x-metronic.base.modal id="exampleModal" title="Modal Title" centered="true"&gt;
    &lt;p&gt;Modal body text goes here.&lt;/p&gt;
    &lt;x-slot name="footer"&gt;
        &lt;button type="button" class="btn btn-light" data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
        &lt;button type="button" class="btn btn-primary"&gt;Save changes&lt;/button&gt;
    &lt;/x-slot&gt;
&lt;/x-metronic.base.modal&gt;
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Base Components II --}}
                <div class="mb-10">
                    <h2 class="mb-5">Base Components II</h2>
                    <div id="base-components-2">
                        {{-- Accordion Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Accordion</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.base.accordion id="kt_accordion_1" :items="[
                                    ['title' => 'Accordion Item 1', 'content' => 'Content for item 1', 'show' => true],
                                    ['title' => 'Accordion Item 2', 'content' => 'Content for item 2'],
                                    ['title' => 'Accordion Item 3', 'content' => 'Content for item 3'],
                                ]" />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.accordion id="kt_accordion_1" :items="[
    ['title' => 'Accordion Item 1', 'content' => '...', 'show' => true],
    ['title' => 'Accordion Item 2', 'content' => '...'],
]" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Tabs Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Tabs</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.base.tabs id="myTab" :tabs="[
                                    ['id' => 'tab1', 'label' => 'Tab 1', 'active' => true],
                                    ['id' => 'tab2', 'label' => 'Tab 2'],
                                ]">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">Tab 1 Content</div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">Tab 2 Content</div>
                                </x-metronic.base.tabs>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.tabs id="myTab" :tabs="['id' => 'tab1', ...]"&gt;
    &lt;div class="tab-pane fade show active" id="tab1"&gt;...&lt;/div&gt;
    &lt;div class="tab-pane fade" id="tab2"&gt;...&lt;/div&gt;
&lt;/x-metronic.base.tabs&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Carousel Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Carousel</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.base.carousel id="kt_carousel_1" :items="[
                                    '<div class=\'text-center p-10\'>First Slide Content</div>',
                                    '<div class=\'text-center p-10\'>Second Slide Content</div>',
                                    '<div class=\'text-center p-10\'>Third Slide Content</div>'
                                ]" />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.carousel id="kt_carousel_1" :items="['...', '...']" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Symbol Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Symbol</h3>
                            <div class="rounded border p-5 mb-5 d-flex gap-2 align-items-center">
                                <x-metronic.base.symbol label="A" color="primary" />
                                <x-metronic.base.symbol label="B" color="danger" circle="true" />
                                <x-metronic.base.symbol label="C" color="success" square="true" badge="true" />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.symbol label="A" color="primary" /&gt;
&lt;x-metronic.base.symbol label="B" color="danger" circle="true" /&gt;
&lt;x-metronic.base.symbol label="C" color="success" square="true" badge="true" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Separator Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Separator</h3>
                            <div class="rounded border p-5 mb-5">
                                <div>Content above</div>
                                <x-metronic.base.separator spacing="my-5" />
                                <div>Content below</div>
                                <x-metronic.base.separator style="dashed" color="primary" spacing="my-5" />
                                <div>Content below dashed</div>
                            </div>
                             <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.base.separator spacing="my-5" /&gt;
&lt;x-metronic.base.separator style="dashed" color="primary" /&gt;
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Widget Components --}}
                <div class="mb-10">
                    <h2 class="mb-5">Widget Components</h2>
                    <div id="widget-components">
                        {{-- Stats Widget --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Stats Widget</h3>
                            <div class="rounded border p-5 mb-5 bg-light">
                                <div class="row g-5">
                                    <div class="col-md-4">
                                        <x-metronic.stats-widget title="Sales" value="$500.00" description="Weekly Sales" color="success" />
                                    </div>
                                    <div class="col-md-4">
                                        <x-metronic.stats-widget title="Revenue" value="$1,200.00" description="Monthly Revenue" color="primary" />
                                    </div>
                                    <div class="col-md-4">
                                        <x-metronic.stats-widget title="Errors" value="23" description="Pending Fixes" color="danger" />
                                    </div>
                                </div>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.stats-widget title="Sales" value="$500.00" description="Weekly Sales" color="success" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Table Widget --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Table Widget</h3>
                            <div class="rounded border p-5 mb-5 bg-light">
                                <x-metronic.table-widget title="Recent Orders" subtitle="More than 500 new orders" :columns="['Order ID', 'Status', 'Amount']">
                                    <tr>
                                        <td>#12345</td>
                                        <td><span class="badge badge-light-success">Completed</span></td>
                                        <td>$120.00</td>
                                    </tr>
                                    <tr>
                                        <td>#12346</td>
                                        <td><span class="badge badge-light-warning">Pending</span></td>
                                        <td>$50.00</td>
                                    </tr>
                                </x-metronic.table-widget>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.table-widget title="Recent Orders" subtitle="..." :columns="['Order ID', '...']"&gt;
    &lt;tr&gt;
        &lt;td&gt;#12345&lt;/td&gt;
        ...
    &lt;/tr&gt;
&lt;/x-metronic.table-widget&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- List Widget --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">List Widget</h3>
                            <div class="rounded border p-5 mb-5 bg-light">
                                <x-metronic.list-widget title="Authors" subtitle="Best Performing">
                                    <x-slot name="toolbar">
                                        <button class="btn btn-sm btn-light btn-active-light-primary">View All</button>
                                    </x-slot>
                                    <div class="d-flex align-items-center mb-7">
                                        <div class="symbol symbol-50px me-5"><span class="symbol-label bg-light-success"><i class="ki-duotone ki-abstract-26 fs-2x text-success"><span class="path1"></span><span class="path2"></span></i></span></div>
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Brad Simmons</a>
                                            <span class="text-muted d-block fw-semibold">Movie Creator</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-7">
                                        <div class="symbol symbol-50px me-5"><span class="symbol-label bg-light-danger"><i class="ki-duotone ki-abstract-26 fs-2x text-danger"><span class="path1"></span><span class="path2"></span></i></span></div>
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Jessie Clarcson</a>
                                            <span class="text-muted d-block fw-semibold">HTML, CSS, JS</span>
                                        </div>
                                    </div>
                                </x-metronic.list-widget>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.list-widget title="Authors" subtitle="Best Performing"&gt;
    &lt;x-slot name="toolbar"&gt;...&lt;/x-slot&gt;
    &lt;!-- Items --&gt;
    &lt;div class="d-flex align-items-center mb-7"&gt;...&lt;/div&gt;
&lt;/x-metronic.list-widget&gt;
                                </pre>
                            </div>
                        </div>

                         {{-- Mixed Widget --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Mixed Widget</h3>
                            <div class="rounded border p-5 mb-5 bg-light">
                                <x-metronic.mixed-widget title="Weekly Sales" stats="$15,000" description="Sales Statistics" color="danger" height="200px">
                                    <x-slot name="toolbar">
                                        <button class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-primary border-0 me-n3">
                                            <i class="ki-duotone ki-category fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                        </button>
                                    </x-slot>
                                    <div class="row g-0">
                                        <div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
                                            <i class="ki-duotone ki-abstract-26 fs-2x text-success mb-3"><span class="path1"></span><span class="path2"></span></i>
                                            <a href="#" class="text-success fw-semibold fs-6 mt-2">Average</a>
                                        </div>
                                        <div class="col bg-light-danger px-6 py-8 rounded-2 mb-7">
                                            <i class="ki-duotone ki-abstract-26 fs-2x text-danger mb-3"><span class="path1"></span><span class="path2"></span></i>
                                            <a href="#" class="text-danger fw-semibold fs-6 mt-2">Total</a>
                                        </div>
                                    </div>
                                </x-metronic.mixed-widget>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.mixed-widget title="Weekly Sales" stats="$15,000" color="danger"&gt;
    &lt;!-- Content --&gt;
&lt;/x-metronic.mixed-widget&gt;
                                </pre>
                            </div>
                        </div>

                    </div>
                </div>

                        {{-- Profile Card --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Profile Card</h3>
                            <div class="rounded border p-5 mb-5 bg-light">
                                <x-metronic.profile-card
                                    name="Max Smith"
                                    role="Developer"
                                    email="max@KT.com"
                                    location="New York"
                                    avatar="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-1.jpg"
                                    :stats="[
                                        ['value' => '90', 'label' => 'Projects', 'color' => 'success'],
                                        ['value' => '$15k', 'label' => 'Earnings', 'color' => 'danger'],
                                        ['value' => '45', 'label' => 'Tasks', 'color' => 'primary']
                                    ]"
                                    completeness="70"
                                />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.profile-card name="Max Smith" ... :stats="[...]" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Project Card --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Project Card</h3>
                            <div class="rounded border p-5 mb-5 bg-light">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-metronic.project-card
                                            title="Metronic Dashboard"
                                            description="Create a dashboard for the new Metronic admin theme."
                                            date="Dec 30, 2024"
                                            budget="$24,000"
                                            progress="60"
                                            status="In Progress"
                                            statusColor="primary"
                                            :users="[
                                                ['name' => 'Emma Smith', 'avatar' => 'https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-6.jpg'],
                                                ['name' => 'Rudy Stone', 'color' => 'danger'],
                                                ['name' => 'Neil Owen', 'color' => 'success']
                                            ]"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.project-card title="Metronic Dashboard" ... :users="[...]" /&gt;
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Components --}}
                <div class="mb-10">
                    <h2 class="mb-5">Form Components</h2>
                    <div id="form-components">
                            {{-- Input Component --}}
                            <div class="mb-10">
                            <h3 class="fw-bold mb-3">Input</h3>
                            <div class="rounded border p-5 mb-5">
                                <div class="mb-5">
                                    <label class="form-label">Basic Input</label>
                                    <x-metronic.forms.input placeholder="Basic Input" />
                                </div>
                                <div class="mb-5">
                                    <label class="form-label">Solid Input</label>
                                    <x-metronic.forms.input solid="true" placeholder="Solid Input" />
                                </div>
                                <div class="mb-5">
                                    <label class="form-label">Flush Input</label>
                                    <x-metronic.forms.input flush="true" placeholder="Flush Input" />
                                </div>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.forms.input placeholder="Basic Input" /&gt;
&lt;x-metronic.forms.input solid="true" placeholder="Solid Input" /&gt;
&lt;x-metronic.forms.input flush="true" placeholder="Flush Input" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Select2 Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Select2</h3>
                            <div class="rounded border p-5 mb-5">
                                <div class="mb-5">
                                    <label class="form-label">Basic Select2</label>
                                    <x-metronic.forms.select2 :options="['1' => 'Option 1', '2' => 'Option 2']" placeholder="Select an option" />
                                </div>
                                <div class="mb-5">
                                    <label class="form-label">Multi-Select (Mockup)</label>
                                    <x-metronic.forms.select2 :options="['a' => 'Apple', 'b' => 'Banana']" hideSearch="true" placeholder="Fruits" />
                                </div>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.forms.select2 :options="['1' => 'Option 1', '2' => 'Option 2']" placeholder="Select an option" /&gt;
&lt;x-metronic.forms.select2 :options="['a' => 'Apple', 'b' => 'Banana']" hideSearch="true" placeholder="Fruits" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Checkbox Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Checkbox</h3>
                            <div class="rounded border p-5 mb-5">
                                <div class="d-flex gap-5">
                                    <x-metronic.forms.checkbox label="Default Checkbox" />
                                    <x-metronic.forms.checkbox label="Checked" checked="true" />
                                    <x-metronic.forms.checkbox label="Custom Solid" custom="true" solid="true" checked="true" />
                                </div>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.forms.checkbox label="Default Checkbox" /&gt;
&lt;x-metronic.forms.checkbox label="Checked" checked="true" /&gt;
&lt;x-metronic.forms.checkbox label="Custom Solid" custom="true" solid="true" checked="true" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Switch Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Switch</h3>
                            <div class="rounded border p-5 mb-5">
                                <div class="d-flex gap-5">
                                    <x-metronic.forms.switch label="Toggle Me" />
                                    <x-metronic.forms.switch label="Checked Switch" checked="true" />
                                </div>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.forms.switch label="Toggle Me" /&gt;
&lt;x-metronic.forms.switch label="Checked Switch" checked="true" /&gt;
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Components II --}}
                <div class="mb-10">
                    <h2 class="mb-5">Form Components II</h2>
                    <div id="form-components-2">
                        {{-- Radio Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Radio</h3>
                            <div class="rounded border p-5 mb-5 d-flex gap-5">
                                <x-metronic.forms.radio name="r1" value="1" label="Option 1" checked="true" />
                                <x-metronic.forms.radio name="r1" value="2" label="Option 2" />
                                <x-metronic.forms.radio name="r2" value="3" label="Solid" solid="true" checked="true" />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.forms.radio name="r1" value="1" label="Option 1" checked="true" /&gt;
&lt;x-metronic.forms.radio name="r2" value="3" label="Solid" solid="true" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Datepicker (Flatpickr) --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Datepicker (Flatpickr)</h3>
                            <div class="rounded border p-5 mb-5">
                                <div class="mb-5">
                                    <label class="form-label">Basic Datepicker</label>
                                    <x-metronic.forms.flatpickr placeholder="Select Date" />
                                </div>
                                <div class="mb-5">
                                    <label class="form-label">DateTime Picker</label>
                                    <x-metronic.forms.flatpickr placeholder="Select Date & Time" enableTime="true" />
                                </div>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.forms.flatpickr placeholder="Select Date" /&gt;
&lt;x-metronic.forms.flatpickr placeholder="Select Date & Time" enableTime="true" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Dropzone --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Dropzone</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.forms.dropzone id="kt_dropzone_demo" message="Drag files here" />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.forms.dropzone id="kt_dropzone_demo" message="Drag files here" /&gt;
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- General Components --}}
                <div class="mb-10">
                    <h2 class="mb-5">General Components</h2>
                    <div id="general-components">
                        {{-- Card Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Card</h3>
                            <div class="rounded border p-5 mb-5 bg-light">
                                <x-metronic.card title="Card Title" footer="Card Footer">
                                    <x-slot name="toolbar">
                                        <button class="btn btn-sm btn-light">Action</button>
                                    </x-slot>
                                    <p>Card content goes here.</p>
                                </x-metronic.card>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.card title="Card Title" footer="Card Footer"&gt;
    &lt;x-slot name="toolbar"&gt;
        &lt;button class="btn btn-sm btn-light"&gt;Action&lt;/button&gt;
    &lt;/x-slot&gt;
    &lt;p&gt;Card content goes here.&lt;/p&gt;
&lt;/x-metronic.card&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Datatable Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Datatable</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.general.datatable 
                                    id="demo_datatable"
                                    :headers="['Name', 'Position', 'Office', 'Age']" 
                                    :rows="[
                                        ['Tiger Nixon', 'System Architect', 'Edinburgh', '61'],
                                        ['Garrett Winters', 'Accountant', 'Tokyo', '63'],
                                        ['Ashton Cox', 'Junior Technical Author', 'San Francisco', '66']
                                    ]" 
                                    striped="true" 
                                />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.general.datatable 
    id="demo_datatable"
    :headers="['Name', 'Position', 'Office', 'Age']" 
    :rows="[ ... ]" 
    striped="true" 
/&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Menu Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Menu</h3>
                            <div class="rounded border p-5 mb-5">
                                <button type="button" class="btn btn-primary me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-flip="top-start">
                                    Click to open menu
                                </button>
                                
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                    </div>
                                    <div class="separator mb-3 opacity-75"></div>
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">New Ticket</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">New Customer</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Reports</a>
                                    </div>
                                </div>
                                
                                <div class="mt-5 text-muted">
                                    Note: The <code>x-metronic.general.menu</code> component provides the wrapper. You can build the menu items inside.
                                </div>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;!-- Trigger --&gt;
&lt;button type="button" class="btn btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"&gt;
    Click to open menu
&lt;/button&gt;

&lt;!-- Menu Wrapper --&gt;
&lt;div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded..." data-kt-menu="true"&gt;
    &lt;div class="menu-item px-3"&gt;
        &lt;a href="#" class="menu-link px-3"&gt;New Ticket&lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;
                                </pre>
                            </div>
                        </div>
                        
                        {{-- Drawer Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Drawer</h3>
                            <div class="rounded border p-5 mb-5">
                                <button id="kt_drawer_example_toggle" class="btn btn-primary">Toggle Drawer</button>
                                <x-metronic.general.drawer id="kt_drawer_example" toggle="kt_drawer_example_toggle" title="Example Drawer">
                                    <div class="p-5">Drawer Content</div>
                                </x-metronic.general.drawer>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;button id="kt_drawer_example_toggle" class="btn btn-primary"&gt;Toggle Drawer&lt;/button&gt;
&lt;x-metronic.general.drawer id="kt_drawer_example" toggle="kt_drawer_example_toggle" title="Example Drawer"&gt;
    &lt;div class="p-5"&gt;Drawer Content&lt;/div&gt;
&lt;/x-metronic.general.drawer&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- Stepper Component --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Stepper</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.general.stepper :steps="[
                                    ['title' => 'Step 1', 'desc' => 'Description 1'],
                                    ['title' => 'Step 2', 'desc' => 'Description 2'],
                                    ['title' => 'Step 3', 'desc' => 'Description 3']
                                ]">
                                    <div class="mb-5">
                                        <div class="flex-column current" data-kt-stepper-element="content">
                                            Step 1 Content
                                        </div>
                                        <div class="flex-column" data-kt-stepper-element="content">
                                            Step 2 Content
                                        </div>
                                        <div class="flex-column" data-kt-stepper-element="content">
                                            Step 3 Content
                                        </div>
                                    </div>
                                </x-metronic.general.stepper>
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.general.stepper :steps="..."&gt;
    &lt;div class="mb-5"&gt;
        &lt;div class="flex-column current" data-kt-stepper-element="content"&gt;...&lt;/div&gt;
        ...
    &lt;/div&gt;
&lt;/x-metronic.general.stepper&gt;
                                </pre>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- General Components II --}}
                <div class="mb-10">
                    <h2 class="mb-5">General Components II</h2>
                    <div id="general-components-2">
                        {{-- Kanban --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">Kanban</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.general.kanban id="kt_kanban_1" :boards="[
                                    ['id' => 'board-1', 'title' => 'To Do', 'class' => 'bg-light-primary', 'item' => [['title' => 'Task 1'], ['title' => 'Task 2']]],
                                    ['id' => 'board-2', 'title' => 'In Progress', 'class' => 'bg-light-warning', 'item' => [['title' => 'Task 3']]],
                                    ['id' => 'board-3', 'title' => 'Done', 'class' => 'bg-light-success', 'item' => [['title' => 'Task 4']]]
                                ]" />
                            </div>
                            <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.general.kanban id="kt_kanban_1" :boards="[...]" /&gt;
                                </pre>
                            </div>
                        </div>

                        {{-- FullCalendar --}}
                        <div class="mb-10">
                            <h3 class="fw-bold mb-3">FullCalendar</h3>
                            <div class="rounded border p-5 mb-5">
                                <x-metronic.general.fullcalendar id="kt_calendar_app" :events="[
                                    ['title' => 'All Day Event', 'start' => date('Y-m-01')],
                                    ['title' => 'Long Event', 'start' => date('Y-m-07'), 'end' => date('Y-m-10')],
                                    ['title' => 'Meeting', 'start' => date('Y-m-12T10:30:00'), 'end' => date('Y-m-12T12:30:00')]
                                ]" />
                            </div>
                             <div class="highlight">
                                <pre class="language-html">
&lt;x-metronic.general.fullcalendar id="kt_calendar_app" :events="[...]" /&gt;
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Init Apex Chart
        var element = document.getElementById('demo_apex_chart');
        if (element) {
            var chart = new ApexCharts(element, {
                series: [{
                    name: 'Net Profit',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                }],
                chart: { type: 'bar', height: 350 },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: { enabled: false },
                stroke: { show: true, width: 2, colors: ['transparent'] },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                },
                fill: { opacity: 1 },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "$ " + val + " thousands"
                        }
                    }
                },
                colors: ['#009EF7']
            });
            chart.render();
        }
    });
</script>
@endsection