<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/teams*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/allot-units*") ? "c-show" : "" }} {{ request()->is("admin/renew-tenancies*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('allot_unit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.allot-units.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/allot-units") || request()->is("admin/allot-units/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.allotUnit.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('renew_tenancy_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.renew-tenancies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/renew-tenancies") || request()->is("admin/renew-tenancies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.renewTenancy.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('asset_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/asset-categories*") ? "c-show" : "" }} {{ request()->is("admin/asset-locations*") ? "c-show" : "" }} {{ request()->is("admin/asset-statuses*") ? "c-show" : "" }} {{ request()->is("admin/assets*") ? "c-show" : "" }} {{ request()->is("admin/assets-histories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.assetManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('asset_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-categories") || request()->is("admin/asset-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_location_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-locations") || request()->is("admin/asset-locations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetLocation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-statuses") || request()->is("admin/asset-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assets") || request()->is("admin/assets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.asset.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('assets_history_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assets-histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assets-histories") || request()->is("admin/assets-histories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-th-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetsHistory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('community_mangement_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/management-committees*") ? "c-show" : "" }} {{ request()->is("admin/builder-informations*") ? "c-show" : "" }} {{ request()->is("admin/community-rules*") ? "c-show" : "" }} {{ request()->is("admin/community-admins*") ? "c-show" : "" }} {{ request()->is("admin/community-informations*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.communityMangement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('management_committee_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.management-committees.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/management-committees") || request()->is("admin/management-committees/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.managementCommittee.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('builder_information_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.builder-informations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/builder-informations") || request()->is("admin/builder-informations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.builderInformation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('community_rule_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.community-rules.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/community-rules") || request()->is("admin/community-rules/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.communityRule.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('community_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.community-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/community-admins") || request()->is("admin/community-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.communityAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('community_information_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.community-informations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/community-informations") || request()->is("admin/community-informations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.communityInformation.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('expense_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/expense-categories*") ? "c-show" : "" }} {{ request()->is("admin/income-categories*") ? "c-show" : "" }} {{ request()->is("admin/expenses*") ? "c-show" : "" }} {{ request()->is("admin/incomes*") ? "c-show" : "" }} {{ request()->is("admin/expense-reports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-money-bill c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.expenseManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('expense_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expense-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expenseCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.income-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.incomeCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expenses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expense.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.incomes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.income.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expense-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expenseReport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('floor_information_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/blocks*") ? "c-show" : "" }} {{ request()->is("admin/floors*") ? "c-show" : "" }} {{ request()->is("admin/units*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.floorInformation.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('block_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.blocks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/blocks") || request()->is("admin/blocks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.block.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('floor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.floors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/floors") || request()->is("admin/floors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.floor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('unit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.units.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/units") || request()->is("admin/units/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.unit.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('help_desk_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/help-desks*") ? "c-show" : "" }} {{ request()->is("admin/meetings*") ? "c-show" : "" }} {{ request()->is("admin/notice-boards*") ? "c-show" : "" }} {{ request()->is("admin/defects*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.helpDeskManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('help_desk_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.help-desks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/help-desks") || request()->is("admin/help-desks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.helpDesk.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('meeting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.meetings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/meetings") || request()->is("admin/meetings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.meeting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('notice_board_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.notice-boards.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/notice-boards") || request()->is("admin/notice-boards/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.noticeBoard.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('defect_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.defects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/defects") || request()->is("admin/defects/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.defect.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('faq_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/faq-categories*") ? "c-show" : "" }} {{ request()->is("admin/faq-questions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faqManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('visitor_mangement_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/visitors*") ? "c-show" : "" }} {{ request()->is("admin/expected-visits*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.visitorMangement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('visitor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.visitors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/visitors") || request()->is("admin/visitors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.visitor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expected_visit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expected-visits.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expected-visits") || request()->is("admin/expected-visits/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expectedVisit.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('task_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/task-statuses*") ? "c-show" : "" }} {{ request()->is("admin/task-tags*") ? "c-show" : "" }} {{ request()->is("admin/tasks*") ? "c-show" : "" }} {{ request()->is("admin/tasks-calendars*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.taskManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('task_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.task.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tasks_calendar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks-calendars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tasksCalendar.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('basic_c_r_m_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/crm-statuses*") ? "c-show" : "" }} {{ request()->is("admin/crm-customers*") ? "c-show" : "" }} {{ request()->is("admin/crm-notes*") ? "c-show" : "" }} {{ request()->is("admin/crm-documents*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.basicCRM.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crm_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-statuses") || request()->is("admin/crm-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-customers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-customers") || request()->is("admin/crm-customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmCustomer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-notes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-notes") || request()->is("admin/crm-notes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmNote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-documents") || request()->is("admin/crm-documents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmDocument.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('product_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/product-categories*") ? "c-show" : "" }} {{ request()->is("admin/product-tags*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.productManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('content_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/content-categories*") ? "c-show" : "" }} {{ request()->is("admin/content-tags*") ? "c-show" : "" }} {{ request()->is("admin/content-pages*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contentManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('content_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentPage.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('client_management_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/currencies*") ? "c-show" : "" }} {{ request()->is("admin/transaction-types*") ? "c-show" : "" }} {{ request()->is("admin/income-sources*") ? "c-show" : "" }} {{ request()->is("admin/client-statuses*") ? "c-show" : "" }} {{ request()->is("admin/project-statuses*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clientManagementSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('currency_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.currencies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/currencies") || request()->is("admin/currencies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-money-bill c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.currency.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transaction_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transaction-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/transaction-types") || request()->is("admin/transaction-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-money-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transactionType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_source_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.income-sources.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/income-sources") || request()->is("admin/income-sources/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.incomeSource.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.client-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/client-statuses") || request()->is("admin/client-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clientStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.project-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/project-statuses") || request()->is("admin/project-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.projectStatus.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('client_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clients*") ? "c-show" : "" }} {{ request()->is("admin/projects*") ? "c-show" : "" }} {{ request()->is("admin/notes*") ? "c-show" : "" }} {{ request()->is("admin/documents*") ? "c-show" : "" }} {{ request()->is("admin/transactions*") ? "c-show" : "" }} {{ request()->is("admin/client-reports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clientManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('client_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clients.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.client.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.project.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.notes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/notes") || request()->is("admin/notes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.note.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.document.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transaction_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transactions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-credit-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transaction.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.client-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/client-reports") || request()->is("admin/client-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clientReport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('contact_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/contact-companies*") ? "c-show" : "" }} {{ request()->is("admin/contact-contacts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-phone-square c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contactManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('contact_company_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contact-companies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contact-companies") || request()->is("admin/contact-companies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contactCompany.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contact_contact_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contact-contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contact-contacts") || request()->is("admin/contact-contacts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contactContact.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('time_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/time-work-types*") ? "c-show" : "" }} {{ request()->is("admin/time-projects*") ? "c-show" : "" }} {{ request()->is("admin/time-entries*") ? "c-show" : "" }} {{ request()->is("admin/time-reports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-clock c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.timeManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('time_work_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.time-work-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/time-work-types") || request()->is("admin/time-work-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-th c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.timeWorkType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('time_project_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.time-projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/time-projects") || request()->is("admin/time-projects/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.timeProject.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('time_entry_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.time-entries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/time-entries") || request()->is("admin/time-entries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.timeEntry.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('time_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.time-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/time-reports") || request()->is("admin/time-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.timeReport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('course_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.courses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.course.title') }}
                </a>
            </li>
        @endcan
        @can('lesson_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.lessons.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/lessons") || request()->is("admin/lessons/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.lesson.title') }}
                </a>
            </li>
        @endcan
        @can('test_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.tests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tests") || request()->is("admin/tests/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.test.title') }}
                </a>
            </li>
        @endcan
        @can('question_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.question.title') }}
                </a>
            </li>
        @endcan
        @can('question_option_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.question-options.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/question-options") || request()->is("admin/question-options/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.questionOption.title') }}
                </a>
            </li>
        @endcan
        @can('test_result_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.test-results.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/test-results") || request()->is("admin/test-results/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.testResult.title') }}
                </a>
            </li>
        @endcan
        @can('test_answer_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.test-answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/test-answers") || request()->is("admin/test-answers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.testAnswer.title') }}
                </a>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/designations*") ? "c-show" : "" }} {{ request()->is("admin/enquiry-categories*") ? "c-show" : "" }} {{ request()->is("admin/defect-categories*") ? "c-show" : "" }} {{ request()->is("admin/defect-sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/purpose-of-visits*") ? "c-show" : "" }} {{ request()->is("admin/skilled-workers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('designation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.designations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/designations") || request()->is("admin/designations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.designation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('enquiry_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.enquiry-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/enquiry-categories") || request()->is("admin/enquiry-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.enquiryCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('defect_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.defect-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/defect-categories") || request()->is("admin/defect-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.defectCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('defect_sub_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.defect-sub-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/defect-sub-categories") || request()->is("admin/defect-sub-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.defectSubCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purpose_of_visit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purpose-of-visits.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purpose-of-visits") || request()->is("admin/purpose-of-visits/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purposeOfVisit.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('skilled_worker_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.skilled-workers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/skilled-workers") || request()->is("admin/skilled-workers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.skilledWorker.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('groupvisitor_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.groupvisitors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/groupvisitors") || request()->is("admin/groupvisitors/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.groupvisitor.title') }}
                </a>
            </li>
        @endcan
        @can('workman_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-workmen*") ? "c-show" : "" }} {{ request()->is("admin/assign-workmen*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.workmanManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('add_workman_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.add-workmen.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-workmen") || request()->is("admin/add-workmen/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.addWorkman.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('assign_workman_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assign-workmen.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assign-workmen") || request()->is("admin/assign-workmen/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assignWorkman.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                <li class="c-sidebar-nav-item">
                    <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "c-active" : "" }} c-sidebar-nav-link" href="{{ route("admin.team-members.index") }}">
                        <i class="c-sidebar-nav-icon fa-fw fa fa-users">
                        </i>
                        <span>{{ trans("global.team-members") }}</span>
                    </a>
                </li>
            @endif
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>