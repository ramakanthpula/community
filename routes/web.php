<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Asset Category
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Location
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Status
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Asset
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets History
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Community Information
    Route::delete('community-informations/destroy', 'CommunityInformationController@massDestroy')->name('community-informations.massDestroy');
    Route::post('community-informations/media', 'CommunityInformationController@storeMedia')->name('community-informations.storeMedia');
    Route::post('community-informations/ckmedia', 'CommunityInformationController@storeCKEditorImages')->name('community-informations.storeCKEditorImages');
    Route::resource('community-informations', 'CommunityInformationController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Builder Information
    Route::delete('builder-informations/destroy', 'BuilderInformationController@massDestroy')->name('builder-informations.massDestroy');
    Route::resource('builder-informations', 'BuilderInformationController');

    // Community Rules
    Route::delete('community-rules/destroy', 'CommunityRulesController@massDestroy')->name('community-rules.massDestroy');
    Route::post('community-rules/media', 'CommunityRulesController@storeMedia')->name('community-rules.storeMedia');
    Route::post('community-rules/ckmedia', 'CommunityRulesController@storeCKEditorImages')->name('community-rules.storeCKEditorImages');
    Route::resource('community-rules', 'CommunityRulesController');

    // Community Admin
    Route::delete('community-admins/destroy', 'CommunityAdminController@massDestroy')->name('community-admins.massDestroy');
    Route::post('community-admins/media', 'CommunityAdminController@storeMedia')->name('community-admins.storeMedia');
    Route::post('community-admins/ckmedia', 'CommunityAdminController@storeCKEditorImages')->name('community-admins.storeCKEditorImages');
    Route::resource('community-admins', 'CommunityAdminController');

    // Block
    Route::delete('blocks/destroy', 'BlockController@massDestroy')->name('blocks.massDestroy');
    Route::post('blocks/media', 'BlockController@storeMedia')->name('blocks.storeMedia');
    Route::post('blocks/ckmedia', 'BlockController@storeCKEditorImages')->name('blocks.storeCKEditorImages');
    Route::resource('blocks', 'BlockController');

    // Floor
    Route::delete('floors/destroy', 'FloorController@massDestroy')->name('floors.massDestroy');
    Route::resource('floors', 'FloorController');

    // Units
    Route::delete('units/destroy', 'UnitsController@massDestroy')->name('units.massDestroy');
    Route::resource('units', 'UnitsController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Currency
    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrencyController');

    // Transaction Type
    Route::delete('transaction-types/destroy', 'TransactionTypeController@massDestroy')->name('transaction-types.massDestroy');
    Route::resource('transaction-types', 'TransactionTypeController');

    // Income Source
    Route::delete('income-sources/destroy', 'IncomeSourceController@massDestroy')->name('income-sources.massDestroy');
    Route::resource('income-sources', 'IncomeSourceController');

    // Client Status
    Route::delete('client-statuses/destroy', 'ClientStatusController@massDestroy')->name('client-statuses.massDestroy');
    Route::resource('client-statuses', 'ClientStatusController');

    // Project Status
    Route::delete('project-statuses/destroy', 'ProjectStatusController@massDestroy')->name('project-statuses.massDestroy');
    Route::resource('project-statuses', 'ProjectStatusController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectController');

    // Note
    Route::delete('notes/destroy', 'NoteController@massDestroy')->name('notes.massDestroy');
    Route::resource('notes', 'NoteController');

    // Document
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Client Report
    Route::delete('client-reports/destroy', 'ClientReportController@massDestroy')->name('client-reports.massDestroy');
    Route::resource('client-reports', 'ClientReportController');

    // Contact Company
    Route::delete('contact-companies/destroy', 'ContactCompanyController@massDestroy')->name('contact-companies.massDestroy');
    Route::resource('contact-companies', 'ContactCompanyController');

    // Contact Contacts
    Route::delete('contact-contacts/destroy', 'ContactContactsController@massDestroy')->name('contact-contacts.massDestroy');
    Route::resource('contact-contacts', 'ContactContactsController');

    // Time Work Type
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Project
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entry
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Report
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::post('lessons/ckmedia', 'LessonsController@storeCKEditorImages')->name('lessons.storeCKEditorImages');
    Route::resource('lessons', 'LessonsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::resource('tests', 'TestsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionsController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionsController');

    // Question Options
    Route::delete('question-options/destroy', 'QuestionOptionsController@massDestroy')->name('question-options.massDestroy');
    Route::resource('question-options', 'QuestionOptionsController');

    // Test Results
    Route::delete('test-results/destroy', 'TestResultsController@massDestroy')->name('test-results.massDestroy');
    Route::resource('test-results', 'TestResultsController');

    // Test Answers
    Route::delete('test-answers/destroy', 'TestAnswersController@massDestroy')->name('test-answers.massDestroy');
    Route::resource('test-answers', 'TestAnswersController');

    // Management Committee
    Route::delete('management-committees/destroy', 'ManagementCommitteeController@massDestroy')->name('management-committees.massDestroy');
    Route::post('management-committees/media', 'ManagementCommitteeController@storeMedia')->name('management-committees.storeMedia');
    Route::post('management-committees/ckmedia', 'ManagementCommitteeController@storeCKEditorImages')->name('management-committees.storeCKEditorImages');
    Route::resource('management-committees', 'ManagementCommitteeController');

    // Help Desk
    Route::delete('help-desks/destroy', 'HelpDeskController@massDestroy')->name('help-desks.massDestroy');
    Route::resource('help-desks', 'HelpDeskController');

    // Meetings
    Route::delete('meetings/destroy', 'MeetingsController@massDestroy')->name('meetings.massDestroy');
    Route::post('meetings/media', 'MeetingsController@storeMedia')->name('meetings.storeMedia');
    Route::post('meetings/ckmedia', 'MeetingsController@storeCKEditorImages')->name('meetings.storeCKEditorImages');
    Route::resource('meetings', 'MeetingsController');

    // Notice Board
    Route::delete('notice-boards/destroy', 'NoticeBoardController@massDestroy')->name('notice-boards.massDestroy');
    Route::post('notice-boards/media', 'NoticeBoardController@storeMedia')->name('notice-boards.storeMedia');
    Route::post('notice-boards/ckmedia', 'NoticeBoardController@storeCKEditorImages')->name('notice-boards.storeCKEditorImages');
    Route::resource('notice-boards', 'NoticeBoardController');

    // Designations
    Route::delete('designations/destroy', 'DesignationsController@massDestroy')->name('designations.massDestroy');
    Route::resource('designations', 'DesignationsController');

    // Enquiry Category
    Route::delete('enquiry-categories/destroy', 'EnquiryCategoryController@massDestroy')->name('enquiry-categories.massDestroy');
    Route::resource('enquiry-categories', 'EnquiryCategoryController');

    // Defect Category
    Route::delete('defect-categories/destroy', 'DefectCategoryController@massDestroy')->name('defect-categories.massDestroy');
    Route::resource('defect-categories', 'DefectCategoryController');

    // Defect Sub Category
    Route::delete('defect-sub-categories/destroy', 'DefectSubCategoryController@massDestroy')->name('defect-sub-categories.massDestroy');
    Route::resource('defect-sub-categories', 'DefectSubCategoryController');

    // Defects
    Route::delete('defects/destroy', 'DefectsController@massDestroy')->name('defects.massDestroy');
    Route::resource('defects', 'DefectsController');

    // Allot Units
    Route::delete('allot-units/destroy', 'AllotUnitsController@massDestroy')->name('allot-units.massDestroy');
    Route::resource('allot-units', 'AllotUnitsController');

    // Renew Tenancy
    Route::delete('renew-tenancies/destroy', 'RenewTenancyController@massDestroy')->name('renew-tenancies.massDestroy');
    Route::post('renew-tenancies/media', 'RenewTenancyController@storeMedia')->name('renew-tenancies.storeMedia');
    Route::post('renew-tenancies/ckmedia', 'RenewTenancyController@storeCKEditorImages')->name('renew-tenancies.storeCKEditorImages');
    Route::resource('renew-tenancies', 'RenewTenancyController');

    // Purpose Of Visit
    Route::delete('purpose-of-visits/destroy', 'PurposeOfVisitController@massDestroy')->name('purpose-of-visits.massDestroy');
    Route::resource('purpose-of-visits', 'PurposeOfVisitController');

    // Visitor
    Route::delete('visitors/destroy', 'VisitorController@massDestroy')->name('visitors.massDestroy');
    Route::resource('visitors', 'VisitorController');

    // Groupvisitors
    Route::delete('groupvisitors/destroy', 'GroupvisitorsController@massDestroy')->name('groupvisitors.massDestroy');
    Route::resource('groupvisitors', 'GroupvisitorsController');

    // Expected Visit
    Route::delete('expected-visits/destroy', 'ExpectedVisitController@massDestroy')->name('expected-visits.massDestroy');
    Route::resource('expected-visits', 'ExpectedVisitController');

    // Skilled Worker
    Route::delete('skilled-workers/destroy', 'SkilledWorkerController@massDestroy')->name('skilled-workers.massDestroy');
    Route::resource('skilled-workers', 'SkilledWorkerController');

    // Add Workman
    Route::delete('add-workmen/destroy', 'AddWorkmanController@massDestroy')->name('add-workmen.massDestroy');
    Route::resource('add-workmen', 'AddWorkmanController');

    // Assign Workman
    Route::delete('assign-workmen/destroy', 'AssignWorkmanController@massDestroy')->name('assign-workmen.massDestroy');
    Route::resource('assign-workmen', 'AssignWorkmanController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
