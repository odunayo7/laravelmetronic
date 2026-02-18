<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
	data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
	data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
	<!--begin::Logo-->
	<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
		<!--begin::Logo image-->
		<a href="{{ route('admin.home') }}">
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

					<div class="menu-item">
						<div class="menu-content">
							<select class="form-select form-select-solid searchable-field">
							</select>
						</div>
					</div>

					<!-- Dashboard -->
					<div class="menu-item">
						<a class="menu-link {{ request()->is('admin') ? 'active' : '' }}"
							href="{{ route('admin.home') }}">
							<span class="menu-icon">
								<i class="ki-duotone ki-element-11 fs-2">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
							</span>
							<span class="menu-title">{{ trans('global.dashboard') }}</span>
						</a>
					</div>

					<!-- User Management -->
					@can('user_management_access')
						<div data-kt-menu-trigger="click"
							class="menu-item menu-accordion {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') || request()->is('admin/teams*') || request()->is('admin/audit-logs*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/permissions*') ? 'active' : '' }}"
											href="{{ route('admin.permissions.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.permission.title') }}</span>
										</a>
									</div>
								@endcan
								@can('role_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/roles*') ? 'active' : '' }}"
											href="{{ route('admin.roles.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.role.title') }}</span>
										</a>
									</div>
								@endcan
								@can('user_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/users*') ? 'active' : '' }}"
											href="{{ route('admin.users.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.user.title') }}</span>
										</a>
									</div>
								@endcan
								@can('audit_log_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}"
											href="{{ route('admin.audit-logs.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.auditLog.title') }}</span>
										</a>
									</div>
								@endcan
								@can('team_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/teams*') ? 'active' : '' }}"
											href="{{ route('admin.teams.index') }}">
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
							class="menu-item menu-accordion {{ request()->is('admin/product-categories*') || request()->is('admin/product-tags*') || request()->is('admin/products*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/product-categories*') ? 'active' : '' }}"
											href="{{ route('admin.product-categories.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.productCategory.title') }}</span>
										</a>
									</div>
								@endcan
								@can('product_tag_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/product-tags*') ? 'active' : '' }}"
											href="{{ route('admin.product-tags.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.productTag.title') }}</span>
										</a>
									</div>
								@endcan
								@can('product_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/products*') ? 'active' : '' }}"
											href="{{ route('admin.products.index') }}">
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
							<a class="menu-link {{ request()->is('admin/user-alerts*') ? 'active' : '' }}"
								href="{{ route('admin.user-alerts.index') }}">
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
							class="menu-item menu-accordion {{ request()->is('admin/asset*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/asset-categories*') ? 'active' : '' }}"
											href="{{ route('admin.asset-categories.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.assetCategory.title') }}</span>
										</a>
									</div>
								@endcan
								@can('asset_location_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/asset-locations*') ? 'active' : '' }}"
											href="{{ route('admin.asset-locations.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.assetLocation.title') }}</span>
										</a>
									</div>
								@endcan
								@can('asset_status_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/asset-statuses*') ? 'active' : '' }}"
											href="{{ route('admin.asset-statuses.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.assetStatus.title') }}</span>
										</a>
									</div>
								@endcan
								@can('asset_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/assets*') ? 'active' : '' }}"
											href="{{ route('admin.assets.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.asset.title') }}</span>
										</a>
									</div>
								@endcan
								@can('assets_history_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/assets-histories*') ? 'active' : '' }}"
											href="{{ route('admin.assets-histories.index') }}">
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
							class="menu-item menu-accordion {{ request()->is('admin/task*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/task-statuses*') ? 'active' : '' }}"
											href="{{ route('admin.task-statuses.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.taskStatus.title') }}</span>
										</a>
									</div>
								@endcan
								@can('task_tag_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/task-tags*') ? 'active' : '' }}"
											href="{{ route('admin.task-tags.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.taskTag.title') }}</span>
										</a>
									</div>
								@endcan
								@can('task_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/tasks*') ? 'active' : '' }}"
											href="{{ route('admin.tasks.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.task.title') }}</span>
										</a>
									</div>
								@endcan
								@can('tasks_calendar_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/tasks-calendars*') ? 'active' : '' }}"
											href="{{ route('admin.tasks-calendars.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.tasksCalendar.title') }}</span>
										</a>
									</div>
								@endcan
							</div>
						</div>
					@endcan

					<!-- Content Management -->
					@can('content_management_access')
						<div data-kt-menu-trigger="click"
							class="menu-item menu-accordion {{ request()->is('admin/content*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/content-categories*') ? 'active' : '' }}"
											href="{{ route('admin.content-categories.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.contentCategory.title') }}</span>
										</a>
									</div>
								@endcan
								@can('content_tag_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/content-tags*') ? 'active' : '' }}"
											href="{{ route('admin.content-tags.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.contentTag.title') }}</span>
										</a>
									</div>
								@endcan
								@can('content_page_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/content-pages*') ? 'active' : '' }}"
											href="{{ route('admin.content-pages.index') }}">
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
							class="menu-item menu-accordion {{ request()->is('admin/faq*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/faq-categories*') ? 'active' : '' }}"
											href="{{ route('admin.faq-categories.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.faqCategory.title') }}</span>
										</a>
									</div>
								@endcan
								@can('faq_question_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/faq-questions*') ? 'active' : '' }}"
											href="{{ route('admin.faq-questions.index') }}">
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
							class="menu-item menu-accordion {{ request()->is('admin/expense*') || request()->is('admin/income*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/expense-categories*') ? 'active' : '' }}"
											href="{{ route('admin.expense-categories.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.expenseCategory.title') }}</span>
										</a>
									</div>
								@endcan
								@can('income_category_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/income-categories*') ? 'active' : '' }}"
											href="{{ route('admin.income-categories.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.incomeCategory.title') }}</span>
										</a>
									</div>
								@endcan
								@can('expense_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/expenses*') ? 'active' : '' }}"
											href="{{ route('admin.expenses.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.expense.title') }}</span>
										</a>
									</div>
								@endcan
								@can('income_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/incomes*') ? 'active' : '' }}"
											href="{{ route('admin.incomes.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.income.title') }}</span>
										</a>
									</div>
								@endcan
								@can('expense_report_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/expense-reports*') ? 'active' : '' }}"
											href="{{ route('admin.expense-reports.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.expenseReport.title') }}</span>
										</a>
									</div>
								@endcan
							</div>
						</div>
					@endcan

					<!-- Client Management Setting -->
					@can('client_management_setting_access')
						<div data-kt-menu-trigger="click"
							class="menu-item menu-accordion {{ request()->is('admin/currencies*') || request()->is('admin/transaction-types*') || request()->is('admin/income-sources*') || request()->is('admin/client-statuses*') || request()->is('admin/project-statuses*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/currencies*') ? 'active' : '' }}"
											href="{{ route('admin.currencies.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.currency.title') }}</span>
										</a>
									</div>
								@endcan
								@can('transaction_type_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/transaction-types*') ? 'active' : '' }}"
											href="{{ route('admin.transaction-types.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.transactionType.title') }}</span>
										</a>
									</div>
								@endcan
								@can('income_source_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/income-sources*') ? 'active' : '' }}"
											href="{{ route('admin.income-sources.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.incomeSource.title') }}</span>
										</a>
									</div>
								@endcan
								@can('client_status_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/client-statuses*') ? 'active' : '' }}"
											href="{{ route('admin.client-statuses.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.clientStatus.title') }}</span>
										</a>
									</div>
								@endcan
								@can('project_status_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/project-statuses*') ? 'active' : '' }}"
											href="{{ route('admin.project-statuses.index') }}">
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
							class="menu-item menu-accordion {{ request()->is('admin/clients*') || request()->is('admin/projects*') || request()->is('admin/notes*') || request()->is('admin/documents*') || request()->is('admin/transactions*') || request()->is("admin/client-reports*") ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/clients*') ? 'active' : '' }}"
											href="{{ route('admin.clients.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.client.title') }}</span>
										</a>
									</div>
								@endcan
								@can('project_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/projects*') ? 'active' : '' }}"
											href="{{ route('admin.projects.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.project.title') }}</span>
										</a>
									</div>
								@endcan
								@can('note_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/notes*') ? 'active' : '' }}"
											href="{{ route('admin.notes.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.note.title') }}</span>
										</a>
									</div>
								@endcan
								@can('document_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/documents*') ? 'active' : '' }}"
											href="{{ route('admin.documents.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.document.title') }}</span>
										</a>
									</div>
								@endcan
								@can('transaction_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/transactions*') ? 'active' : '' }}"
											href="{{ route('admin.transactions.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.transaction.title') }}</span>
										</a>
									</div>
								@endcan
								@can('client_report_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/client-reports*') ? 'active' : '' }}"
											href="{{ route('admin.client-reports.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.clientReport.title') }}</span>
										</a>
									</div>
								@endcan
							</div>
						</div>
					@endcan

					<!-- Contact Management -->
					@can('contact_management_access')
						<div data-kt-menu-trigger="click"
							class="menu-item menu-accordion {{ request()->is("admin/contact-companies*") || request()->is("admin/contact-contacts*") ? 'show' : '' }}">
							<span class="menu-link">
								<span class="menu-icon">
									<i class="ki-duotone ki-address-book fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.contactManagement.title') }}</span>
								<span class="menu-arrow"></span>
							</span>
							<div class="menu-sub menu-sub-accordion">
								@can('contact_company_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is("admin/contact-companies*") ? 'active' : '' }}"
											href="{{ route("admin.contact-companies.index") }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.contactCompany.title') }}</span>
										</a>
									</div>
								@endcan
								@can('contact_contact_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is("admin/contact-contacts*") ? 'active' : '' }}"
											href="{{ route("admin.contact-contacts.index") }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.contactContact.title') }}</span>
										</a>
									</div>
								@endcan
							</div>
						</div>
					@endcan

					<!-- Time Management -->
					@can('time_management_access')
						<div data-kt-menu-trigger="click"
							class="menu-item menu-accordion {{ request()->is("admin/time-work-types*") || request()->is("admin/time-projects*") || request()->is("admin/time-entries*") || request()->is("admin/time-reports*") ? 'show' : '' }}">
							<span class="menu-link">
								<span class="menu-icon">
									<i class="ki-duotone ki-timer fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.timeManagement.title') }}</span>
								<span class="menu-arrow"></span>
							</span>
							<div class="menu-sub menu-sub-accordion">
								@can('time_work_type_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is("admin/time-work-types*") ? 'active' : '' }}"
											href="{{ route("admin.time-work-types.index") }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.timeWorkType.title') }}</span>
										</a>
									</div>
								@endcan
								@can('time_project_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is("admin/time-projects*") ? 'active' : '' }}"
											href="{{ route("admin.time-projects.index") }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.timeProject.title') }}</span>
										</a>
									</div>
								@endcan
								@can('time_entry_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is("admin/time-entries*") ? 'active' : '' }}"
											href="{{ route("admin.time-entries.index") }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.timeEntry.title') }}</span>
										</a>
									</div>
								@endcan
								@can('time_report_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is("admin/time-reports*") ? 'active' : '' }}"
											href="{{ route("admin.time-reports.index") }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.timeReport.title') }}</span>
										</a>
									</div>
								@endcan
							</div>
						</div>
					@endcan

					<!-- Courses, Lessons, Tests -->
					@can('course_access')
						<div class="menu-item">
							<a class="menu-link {{ request()->is("admin/courses*") ? 'active' : '' }}"
								href="{{ route("admin.courses.index") }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-teacher fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.course.title') }}</span>
							</a>
						</div>
					@endcan
					@can('lesson_access')
						<div class="menu-item">
							<a class="menu-link {{ request()->is("admin/lessons*") ? 'active' : '' }}"
								href="{{ route("admin.lessons.index") }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-book fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
										<span class="path4"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.lesson.title') }}</span>
							</a>
						</div>
					@endcan
					@can('test_access')
						<div class="menu-item">
							<a class="menu-link {{ request()->is("admin/tests*") ? 'active' : '' }}"
								href="{{ route("admin.tests.index") }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-file fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.test.title') }}</span>
							</a>
						</div>
					@endcan
					@can('question_access')
						<div class="menu-item">
							<a class="menu-link {{ request()->is("admin/questions*") ? 'active' : '' }}"
								href="{{ route("admin.questions.index") }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-question fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.question.title') }}</span>
							</a>
						</div>
					@endcan
					@can('question_option_access')
						<div class="menu-item">
							<a class="menu-link {{ request()->is("admin/question-options*") ? 'active' : '' }}"
								href="{{ route("admin.question-options.index") }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-row-horizontal fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.questionOption.title') }}</span>
							</a>
						</div>
					@endcan
					@can('test_result_access')
						<div class="menu-item">
							<a class="menu-link {{ request()->is("admin/test-results*") ? 'active' : '' }}"
								href="{{ route("admin.test-results.index") }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-chart-simple fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
										<span class="path4"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.testResult.title') }}</span>
							</a>
						</div>
					@endcan
					@can('test_answer_access')
						<div class="menu-item">
							<a class="menu-link {{ request()->is("admin/test-answers*") ? 'active' : '' }}"
								href="{{ route("admin.test-answers.index") }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-notepad-edit fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans('cruds.testAnswer.title') }}</span>
							</a>
						</div>
					@endcan

					<!-- CRM -->
					@can('basic_c_r_m_access')
						<div data-kt-menu-trigger="click"
							class="menu-item menu-accordion {{ request()->is('admin/crm*') ? 'show' : '' }}">
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
										<a class="menu-link {{ request()->is('admin/crm-statuses*') ? 'active' : '' }}"
											href="{{ route('admin.crm-statuses.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.crmStatus.title') }}</span>
										</a>
									</div>
								@endcan
								@can('crm_customer_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/crm-customers*') ? 'active' : '' }}"
											href="{{ route('admin.crm-customers.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.crmCustomer.title') }}</span>
										</a>
									</div>
								@endcan
								@can('crm_note_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/crm-notes*') ? 'active' : '' }}"
											href="{{ route('admin.crm-notes.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.crmNote.title') }}</span>
										</a>
									</div>
								@endcan
								@can('crm_document_access')
									<div class="menu-item">
										<a class="menu-link {{ request()->is('admin/crm-documents*') ? 'active' : '' }}"
											href="{{ route('admin.crm-documents.index') }}">
											<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
											<span class="menu-title">{{ trans('cruds.crmDocument.title') }}</span>
										</a>
									</div>
								@endcan
							</div>
						</div>
					@endcan

					<!-- System Calendar -->
					<div class="menu-item">
						<a class="menu-link {{ request()->is("admin/system-calendar*") ? 'active' : '' }}"
							href="{{ route("admin.systemCalendar") }}">
							<span class="menu-icon">
								<i class="ki-duotone ki-calendar fs-2">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
							<span class="menu-title">{{ trans('global.systemCalendar') }}</span>
						</a>
					</div>

					<!-- Messages -->
					@php($unread = \App\Models\QaTopic::unreadCount())
					<div class="menu-item">
						<a class="menu-link {{ request()->is("admin/messenger*") ? 'active' : '' }}"
							href="{{ route("admin.messenger.index") }}">
							<span class="menu-icon">
								<i class="ki-duotone ki-message-text-2 fs-2">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
								</i>
							</span>
							<span class="menu-title">{{ trans('global.messages') }}</span>
							@if($unread > 0)
								<span class="badge badge-sm badge-circle badge-danger ms-2">{{ $unread }}</span>
							@endif
						</a>
					</div>

					@if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
						<div class="menu-item">
							<a class="menu-link {{ request()->is("admin/team-members*") ? 'active' : '' }}"
								href="{{ route("admin.team-members.index") }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-profile-user fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
										<span class="path4"></span>
									</i>
								</span>
								<span class="menu-title">{{ trans("global.team-members") }}</span>
							</a>
						</div>
					@endif

					<!-- Change Password -->
					@if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
						@can('profile_password_edit')
							<div class="menu-item">
								<a class="menu-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
									href="{{ route('profile.password.edit') }}">
									<span class="menu-icon">
										<i class="ki-duotone ki-key fs-2">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</span>
									<span class="menu-title">{{ trans('global.change_password') }}</span>
								</a>
							</div>
						@endcan
					@endif

					<div class="menu-item">
						<a class="menu-link" href="#"
							onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
							<span class="menu-icon">
								<i class="ki-duotone ki-entrance-left fs-2">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
							<span class="menu-title">{{ trans('global.logout') }}</span>
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
			onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
			class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
			data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Logout">
			<span class="btn-label">Logout</span>
			<i class="ki-duotone ki-document-btn btn-icon fs-2 m-0">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</a>
	</div>
	<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
		@csrf
	</form>
	<!--end::Footer-->
</div>