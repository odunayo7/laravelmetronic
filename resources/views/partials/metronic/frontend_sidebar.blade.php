<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('frontend.home') }}">
            <img alt="Logo" src="{{ asset('metronic/assets/media/logos/default-dark.svg') }}"
                class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('metronic/assets/media/logos/default-small.svg') }}"
                class="h-20px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">

                    <!-- Dashboard -->
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('frontend/home') ? 'active' : '' }}"
                            href="{{ route('frontend.home') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">{{ __('Dashboard') }}</span>
                        </a>
                    </div>

                    <!-- My Profile -->
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('frontend/profile') ? 'active' : '' }}"
                            href="{{ route('frontend.profile.index') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-user fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">{{ __('My profile') }}</span>
                        </a>
                    </div>

                    <!-- User Management -->
                    @can('user_management_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/permissions*') || request()->is('frontend/roles*') || request()->is('frontend/users*') || request()->is('frontend/teams*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-user fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.userManagement.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('permission_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/permissions*') ? 'active' : '' }}"
                                            href="{{ route('frontend.permissions.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.permission.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('role_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/roles*') ? 'active' : '' }}"
                                            href="{{ route('frontend.roles.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.role.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('user_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/users*') ? 'active' : '' }}"
                                            href="{{ route('frontend.users.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.user.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('team_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/teams*') ? 'active' : '' }}"
                                            href="{{ route('frontend.teams.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.team.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <!-- Product Management -->
                    @can('product_management_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/product-categories*') || request()->is('frontend/product-tags*') || request()->is('frontend/products*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-basket fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.productManagement.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('product_category_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/product-categories*') ? 'active' : '' }}"
                                            href="{{ route('frontend.product-categories.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.productCategory.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('product_tag_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/product-tags*') ? 'active' : '' }}"
                                            href="{{ route('frontend.product-tags.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.productTag.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('product_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/products*') ? 'active' : '' }}"
                                            href="{{ route('frontend.products.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.product.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    @can('user_alert_access')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('frontend/user-alerts*') ? 'active' : '' }}"
                                href="{{ route('frontend.user-alerts.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-notification-on fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.userAlert.title') }}</span>
                            </a>
                        </div>
                    @endcan

                    <!-- Asset Management -->
                    @can('asset_management_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/asset*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-monitor-mobile fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.assetManagement.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('asset_category_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/asset-categories*') ? 'active' : '' }}"
                                            href="{{ route('frontend.asset-categories.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.assetCategory.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('asset_location_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/asset-locations*') ? 'active' : '' }}"
                                            href="{{ route('frontend.asset-locations.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.assetLocation.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('asset_status_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/asset-statuses*') ? 'active' : '' }}"
                                            href="{{ route('frontend.asset-statuses.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.assetStatus.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('asset_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/assets*') ? 'active' : '' }}"
                                            href="{{ route('frontend.assets.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.asset.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('assets_history_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/assets-histories*') ? 'active' : '' }}"
                                            href="{{ route('frontend.assets-histories.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.assetsHistory.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <!-- Task Management -->
                    @can('task_management_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/task*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-check fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.taskManagement.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('task_status_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/task-statuses*') ? 'active' : '' }}"
                                            href="{{ route('frontend.task-statuses.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.taskStatus.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('task_tag_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/task-tags*') ? 'active' : '' }}"
                                            href="{{ route('frontend.task-tags.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.taskTag.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('task_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/tasks*') ? 'active' : '' }}"
                                            href="{{ route('frontend.tasks.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.task.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <!-- Content Management -->
                    @can('content_management_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/content*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-document fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.contentManagement.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('content_category_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/content-categories*') ? 'active' : '' }}"
                                            href="{{ route('frontend.content-categories.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.contentCategory.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('content_tag_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/content-tags*') ? 'active' : '' }}"
                                            href="{{ route('frontend.content-tags.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.contentTag.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('content_page_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/content-pages*') ? 'active' : '' }}"
                                            href="{{ route('frontend.content-pages.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.contentPage.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <!-- FAQ Management -->
                    @can('faq_management_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/faq*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-message-question fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.faqManagement.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('faq_category_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/faq-categories*') ? 'active' : '' }}"
                                            href="{{ route('frontend.faq-categories.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.faqCategory.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('faq_question_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/faq-questions*') ? 'active' : '' }}"
                                            href="{{ route('frontend.faq-questions.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.faqQuestion.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <!-- Expense Management -->
                    @can('expense_management_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/expense*') || request()->is('frontend/income*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-dollar fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.expenseManagement.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('expense_category_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/expense-categories*') ? 'active' : '' }}"
                                            href="{{ route('frontend.expense-categories.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.expenseCategory.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('income_category_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/income-categories*') ? 'active' : '' }}"
                                            href="{{ route('frontend.income-categories.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.incomeCategory.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('expense_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/expenses*') ? 'active' : '' }}"
                                            href="{{ route('frontend.expenses.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.expense.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('income_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/incomes*') ? 'active' : '' }}"
                                            href="{{ route('frontend.incomes.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.income.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <!-- Client Management Setting -->
                    @can('client_management_setting_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/currencies*') || request()->is('frontend/transaction-types*') || request()->is('frontend/income-sources*') || request()->is('frontend/client-statuses*') || request()->is('frontend/project-statuses*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-gear fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.clientManagementSetting.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('currency_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/currencies*') ? 'active' : '' }}"
                                            href="{{ route('frontend.currencies.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.currency.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                <!-- Add other sub-items similarly if needed, truncating for length but following pattern -->
                                @can('transaction_type_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/transaction-types*') ? 'active' : '' }}"
                                            href="{{ route('frontend.transaction-types.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.transactionType.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('income_source_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/income-sources*') ? 'active' : '' }}"
                                            href="{{ route('frontend.income-sources.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.incomeSource.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('client_status_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/client-statuses*') ? 'active' : '' }}"
                                            href="{{ route('frontend.client-statuses.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.clientStatus.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('project_status_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/project-statuses*') ? 'active' : '' }}"
                                            href="{{ route('frontend.project-statuses.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.projectStatus.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <!-- Client Management -->
                    @can('client_management_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/clients*') || request()->is('frontend/projects*') || request()->is('frontend/notes*') || request()->is('frontend/documents*') || request()->is('frontend/transactions*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-briefcase fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.clientManagement.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('client_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/clients*') ? 'active' : '' }}"
                                            href="{{ route('frontend.clients.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.client.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('project_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/projects*') ? 'active' : '' }}"
                                            href="{{ route('frontend.projects.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.project.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('note_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/notes*') ? 'active' : '' }}"
                                            href="{{ route('frontend.notes.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.note.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('document_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/documents*') ? 'active' : '' }}"
                                            href="{{ route('frontend.documents.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.document.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('transaction_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/transactions*') ? 'active' : '' }}"
                                            href="{{ route('frontend.transactions.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.transaction.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <!-- CRM -->
                    @can('basic_c_r_m_access')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->is('frontend/crm*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-people fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ trans('cruds.basicCRM.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('crm_status_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/crm-statuses*') ? 'active' : '' }}"
                                            href="{{ route('frontend.crm-statuses.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.crmStatus.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('crm_customer_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/crm-customers*') ? 'active' : '' }}"
                                            href="{{ route('frontend.crm-customers.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.crmCustomer.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('crm_note_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/crm-notes*') ? 'active' : '' }}"
                                            href="{{ route('frontend.crm-notes.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.crmNote.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('crm_document_access')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('frontend/crm-documents*') ? 'active' : '' }}"
                                            href="{{ route('frontend.crm-documents.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ trans('cruds.crmDocument.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    <div class="menu-item">
                        <a class="menu-link" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-entrance-left fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">{{ __('Logout') }}</span>
                        </a>
                    </div>
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Scroll wrapper-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Logout">
            <span class="btn-label">Logout</span>
            <i class="ki-duotone ki-document-btn btn-icon fs-2 m-0">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </a>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!--end::Footer-->
</div>