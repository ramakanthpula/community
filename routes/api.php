<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Asset Category
    Route::apiResource('asset-categories', 'AssetCategoryApiController');

    // Asset Location
    Route::apiResource('asset-locations', 'AssetLocationApiController');

    // Asset Status
    Route::apiResource('asset-statuses', 'AssetStatusApiController');

    // Asset
    Route::post('assets/media', 'AssetApiController@storeMedia')->name('assets.storeMedia');
    Route::apiResource('assets', 'AssetApiController');

    // Assets History
    Route::apiResource('assets-histories', 'AssetsHistoryApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Faq Category
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Question
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Expense Category
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Income Category
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expense
    Route::apiResource('expenses', 'ExpenseApiController');

    // Income
    Route::apiResource('incomes', 'IncomeApiController');

    // Task Status
    Route::apiResource('task-statuses', 'TaskStatusApiController');

    // Task Tag
    Route::apiResource('task-tags', 'TaskTagApiController');

    // Task
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');

    // Community Information
    Route::post('community-informations/media', 'CommunityInformationApiController@storeMedia')->name('community-informations.storeMedia');
    Route::apiResource('community-informations', 'CommunityInformationApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');

    // Builder Information
    Route::apiResource('builder-informations', 'BuilderInformationApiController');

    // Community Rules
    Route::post('community-rules/media', 'CommunityRulesApiController@storeMedia')->name('community-rules.storeMedia');
    Route::apiResource('community-rules', 'CommunityRulesApiController');

    // Community Admin
    Route::post('community-admins/media', 'CommunityAdminApiController@storeMedia')->name('community-admins.storeMedia');
    Route::apiResource('community-admins', 'CommunityAdminApiController');

    // Block
    Route::post('blocks/media', 'BlockApiController@storeMedia')->name('blocks.storeMedia');
    Route::apiResource('blocks', 'BlockApiController');

    // Floor
    Route::apiResource('floors', 'FloorApiController');

    // Units
    Route::apiResource('units', 'UnitsApiController');

    // Crm Status
    Route::apiResource('crm-statuses', 'CrmStatusApiController');

    // Crm Customer
    Route::apiResource('crm-customers', 'CrmCustomerApiController');

    // Crm Note
    Route::apiResource('crm-notes', 'CrmNoteApiController');

    // Crm Document
    Route::post('crm-documents/media', 'CrmDocumentApiController@storeMedia')->name('crm-documents.storeMedia');
    Route::apiResource('crm-documents', 'CrmDocumentApiController');

    // Product Category
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tag
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Content Category
    Route::apiResource('content-categories', 'ContentCategoryApiController');

    // Content Tag
    Route::apiResource('content-tags', 'ContentTagApiController');

    // Content Page
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');

    // Currency
    Route::apiResource('currencies', 'CurrencyApiController');

    // Transaction Type
    Route::apiResource('transaction-types', 'TransactionTypeApiController');

    // Income Source
    Route::apiResource('income-sources', 'IncomeSourceApiController');

    // Client Status
    Route::apiResource('client-statuses', 'ClientStatusApiController');

    // Project Status
    Route::apiResource('project-statuses', 'ProjectStatusApiController');

    // Client
    Route::apiResource('clients', 'ClientApiController');

    // Project
    Route::apiResource('projects', 'ProjectApiController');

    // Note
    Route::apiResource('notes', 'NoteApiController');

    // Document
    Route::post('documents/media', 'DocumentApiController@storeMedia')->name('documents.storeMedia');
    Route::apiResource('documents', 'DocumentApiController');

    // Transaction
    Route::apiResource('transactions', 'TransactionApiController');

    // Contact Company
    Route::apiResource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::apiResource('contact-contacts', 'ContactContactsApiController');

    // Time Work Type
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Time Project
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Time Entry
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::apiResource('courses', 'CoursesApiController');

    // Lessons
    Route::post('lessons/media', 'LessonsApiController@storeMedia')->name('lessons.storeMedia');
    Route::apiResource('lessons', 'LessonsApiController');

    // Tests
    Route::apiResource('tests', 'TestsApiController');

    // Questions
    Route::post('questions/media', 'QuestionsApiController@storeMedia')->name('questions.storeMedia');
    Route::apiResource('questions', 'QuestionsApiController');

    // Question Options
    Route::apiResource('question-options', 'QuestionOptionsApiController');

    // Test Results
    Route::apiResource('test-results', 'TestResultsApiController');

    // Test Answers
    Route::apiResource('test-answers', 'TestAnswersApiController');

    // Management Committee
    Route::post('management-committees/media', 'ManagementCommitteeApiController@storeMedia')->name('management-committees.storeMedia');
    Route::apiResource('management-committees', 'ManagementCommitteeApiController');

    // Help Desk
    Route::apiResource('help-desks', 'HelpDeskApiController');

    // Meetings
    Route::post('meetings/media', 'MeetingsApiController@storeMedia')->name('meetings.storeMedia');
    Route::apiResource('meetings', 'MeetingsApiController');

    // Notice Board
    Route::post('notice-boards/media', 'NoticeBoardApiController@storeMedia')->name('notice-boards.storeMedia');
    Route::apiResource('notice-boards', 'NoticeBoardApiController');

    // Designations
    Route::apiResource('designations', 'DesignationsApiController');

    // Enquiry Category
    Route::apiResource('enquiry-categories', 'EnquiryCategoryApiController');

    // Defect Category
    Route::apiResource('defect-categories', 'DefectCategoryApiController');

    // Defect Sub Category
    Route::apiResource('defect-sub-categories', 'DefectSubCategoryApiController');

    // Defects
    Route::apiResource('defects', 'DefectsApiController');

    // Allot Units
    Route::apiResource('allot-units', 'AllotUnitsApiController');

    // Renew Tenancy
    Route::post('renew-tenancies/media', 'RenewTenancyApiController@storeMedia')->name('renew-tenancies.storeMedia');
    Route::apiResource('renew-tenancies', 'RenewTenancyApiController');

    // Purpose Of Visit
    Route::apiResource('purpose-of-visits', 'PurposeOfVisitApiController');

    // Visitor
    Route::apiResource('visitors', 'VisitorApiController');

    // Groupvisitors
    Route::apiResource('groupvisitors', 'GroupvisitorsApiController');

    // Expected Visit
    Route::apiResource('expected-visits', 'ExpectedVisitApiController');

    // Skilled Worker
    Route::apiResource('skilled-workers', 'SkilledWorkerApiController');

    // Add Workman
    Route::apiResource('add-workmen', 'AddWorkmanApiController');

    // Assign Workman
    Route::apiResource('assign-workmen', 'AssignWorkmanApiController');
});
