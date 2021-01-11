<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // User Registration Requests
    Route::resource('user-registration-requests', 'UserRegistrationRequestController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Regions
    Route::delete('regions/destroy', 'RegionController@massDestroy')->name('regions.massDestroy');
    Route::post('regions/parse-csv-import', 'RegionController@parseCsvImport')->name('regions.parseCsvImport');
    Route::post('regions/process-csv-import', 'RegionController@processCsvImport')->name('regions.processCsvImport');
    Route::resource('regions', 'RegionController');

    // Designations
    Route::delete('designations/destroy', 'DesignationController@massDestroy')->name('designations.massDestroy');
    Route::post('designations/parse-csv-import', 'DesignationController@parseCsvImport')->name('designations.parseCsvImport');
    Route::post('designations/process-csv-import', 'DesignationController@processCsvImport')->name('designations.processCsvImport');
    Route::resource('designations', 'DesignationController');

    // Offices
    Route::delete('offices/destroy', 'OfficeController@massDestroy')->name('offices.massDestroy');
    Route::post('offices/parse-csv-import', 'OfficeController@parseCsvImport')->name('offices.parseCsvImport');
    Route::post('offices/process-csv-import', 'OfficeController@processCsvImport')->name('offices.processCsvImport');
    Route::resource('offices', 'OfficeController');

    // Oso Agws
    Route::delete('oso-agws/destroy', 'OsoAgwController@massDestroy')->name('oso-agws.massDestroy');
    Route::post('oso-agws/media', 'OsoAgwController@storeMedia')->name('oso-agws.storeMedia');
    Route::post('oso-agws/ckmedia', 'OsoAgwController@storeCKEditorImages')->name('oso-agws.storeCKEditorImages');
    Route::post('oso-agws/parse-csv-import', 'OsoAgwController@parseCsvImport')->name('oso-agws.parseCsvImport');
    Route::post('oso-agws/process-csv-import', 'OsoAgwController@processCsvImport')->name('oso-agws.processCsvImport');
    Route::resource('oso-agws', 'OsoAgwController');

    // Tndp Ims Agws
    Route::delete('tndp-ims-agws/destroy', 'TndpImsAgwController@massDestroy')->name('tndp-ims-agws.massDestroy');
    Route::post('tndp-ims-agws/media', 'TndpImsAgwController@storeMedia')->name('tndp-ims-agws.storeMedia');
    Route::post('tndp-ims-agws/ckmedia', 'TndpImsAgwController@storeCKEditorImages')->name('tndp-ims-agws.storeCKEditorImages');
    Route::post('tndp-ims-agws/parse-csv-import', 'TndpImsAgwController@parseCsvImport')->name('tndp-ims-agws.parseCsvImport');
    Route::post('tndp-ims-agws/process-csv-import', 'TndpImsAgwController@processCsvImport')->name('tndp-ims-agws.processCsvImport');
    Route::resource('tndp-ims-agws', 'TndpImsAgwController');

    // Oso Numbers
    Route::delete('oso-numbers/destroy', 'OsoNumbersController@massDestroy')->name('oso-numbers.massDestroy');
    Route::post('oso-numbers/parse-csv-import', 'OsoNumbersController@parseCsvImport')->name('oso-numbers.parseCsvImport');
    Route::post('oso-numbers/process-csv-import', 'OsoNumbersController@processCsvImport')->name('oso-numbers.processCsvImport');
    Route::resource('oso-numbers', 'OsoNumbersController');

    // Oso Number Profiles
    Route::delete('oso-number-profiles/destroy', 'OsoNumberProfileController@massDestroy')->name('oso-number-profiles.massDestroy');
    Route::post('oso-number-profiles/parse-csv-import', 'OsoNumberProfileController@parseCsvImport')->name('oso-number-profiles.parseCsvImport');
    Route::post('oso-number-profiles/process-csv-import', 'OsoNumberProfileController@processCsvImport')->name('oso-number-profiles.processCsvImport');
    Route::resource('oso-number-profiles', 'OsoNumberProfileController');

    // Phone Number Validation
    Route::post('number-lists/validate','OsoNumbersController@validate171klPhoneNumber')->name('validate-171kl-phone-number');


    // Tndp Ims Numbers
    Route::delete('tndp-ims-numbers/destroy', 'TndpImsNumbersController@massDestroy')->name('tndp-ims-numbers.massDestroy');
    Route::post('tndp-ims-numbers/parse-csv-import', 'TndpImsNumbersController@parseCsvImport')->name('tndp-ims-numbers.parseCsvImport');
    Route::post('tndp-ims-numbers/process-csv-import', 'TndpImsNumbersController@processCsvImport')->name('tndp-ims-numbers.processCsvImport');
    Route::resource('tndp-ims-numbers', 'TndpImsNumbersController');

    // Tndp Ims Number Profiles
    Route::delete('tndp-ims-number-profiles/destroy', 'TndpImsNumberProfileController@massDestroy')->name('tndp-ims-number-profiles.massDestroy');
    Route::post('tndp-ims-number-profiles/parse-csv-import', 'TndpImsNumberProfileController@parseCsvImport')->name('tndp-ims-number-profiles.parseCsvImport');
    Route::post('tndp-ims-number-profiles/process-csv-import', 'TndpImsNumberProfileController@processCsvImport')->name('tndp-ims-number-profiles.processCsvImport');
    Route::resource('tndp-ims-number-profiles', 'TndpImsNumberProfileController');

    // Employees
    Route::delete('employees/destroy', 'EmployeeController@massDestroy')->name('employees.massDestroy');
    Route::post('employees/parse-csv-import', 'EmployeeController@parseCsvImport')->name('employees.parseCsvImport');
    Route::post('employees/process-csv-import', 'EmployeeController@processCsvImport')->name('employees.processCsvImport');
    Route::resource('employees', 'EmployeeController');

    // Request Types
    Route::delete('request-types/destroy', 'RequestTypeController@massDestroy')->name('request-types.massDestroy');
    Route::post('request-types/parse-csv-import', 'RequestTypeController@parseCsvImport')->name('request-types.parseCsvImport');
    Route::post('request-types/process-csv-import', 'RequestTypeController@processCsvImport')->name('request-types.processCsvImport');
    Route::resource('request-types', 'RequestTypeController');

    // Job Request Statuses
    Route::delete('job-request-statuses/destroy', 'JobRequestStatusController@massDestroy')->name('job-request-statuses.massDestroy');
    Route::post('job-request-statuses/parse-csv-import', 'JobRequestStatusController@parseCsvImport')->name('job-request-statuses.parseCsvImport');
    Route::post('job-request-statuses/process-csv-import', 'JobRequestStatusController@processCsvImport')->name('job-request-statuses.processCsvImport');
    Route::resource('job-request-statuses', 'JobRequestStatusController');

    // Network Types
    Route::delete('network-types/destroy', 'NetworkTypeController@massDestroy')->name('network-types.massDestroy');
    Route::post('network-types/parse-csv-import', 'NetworkTypeController@parseCsvImport')->name('network-types.parseCsvImport');
    Route::post('network-types/process-csv-import', 'NetworkTypeController@processCsvImport')->name('network-types.processCsvImport');
    Route::resource('network-types', 'NetworkTypeController');

    // Job Types
    Route::delete('job-types/destroy', 'JobTypeController@massDestroy')->name('job-types.massDestroy');
    Route::post('job-types/parse-csv-import', 'JobTypeController@parseCsvImport')->name('job-types.parseCsvImport');
    Route::post('job-types/process-csv-import', 'JobTypeController@processCsvImport')->name('job-types.processCsvImport');
    Route::resource('job-types', 'JobTypeController');

    // Job Requests
    Route::delete('job-requests/destroy', 'JobRequestController@massDestroy')->name('job-requests.massDestroy');
    Route::post('job-requests/media', 'JobRequestController@storeMedia')->name('job-requests.storeMedia');
    Route::post('job-requests/ckmedia', 'JobRequestController@storeCKEditorImages')->name('job-requests.storeCKEditorImages');
    Route::post('job-requests/parse-csv-import', 'JobRequestController@parseCsvImport')->name('job-requests.parseCsvImport');
    Route::post('job-requests/process-csv-import', 'JobRequestController@processCsvImport')->name('job-requests.processCsvImport');
    Route::resource('job-requests', 'JobRequestController');

    // Core Job Requests
    Route::resource('core-job-requests', 'CoreJobRequestController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('171kl-network/{jobId}/core-job-request','CoreJobRequestController@coreJobRequest')->name('171klnetwork.corejob.request');

    Route::post('171kl-network/core-job/new-connection','OsoNumbersController@storeCoreJobNewConnectionRequest')->name('171klnetwork.corejob.store-new-connection.request');
    Route::post('171kl-network/core-job/re-connection','CoreJobRequestController@store171klCoreJobReConnectionRequest')->name('171klnetwork.corejob.store-re-connection.request');
    Route::post('171kl-network/core-job/casual-connection','CoreJobRequestController@store171klCoreJobCasualConnectionRequest')->name('171klnetwork.corejob.store-casual-connection.request');
    Route::post('171kl-network/core-job/casual-disconnection','CoreJobRequestController@store171klCoreJobCasualDisconnectionRequest')->name('171klnetwork.corejob.store-casual-disconnection.request');
    Route::post('171kl-network/core-job/restoration','CoreJobRequestController@store171klCoreJobRestorationRequest')->name('171klnetwork.corejob.store-restoration.request');
    Route::post('171kl-network/core-job/temporary-disconnection','CoreJobRequestController@store171klCoreJobTemporaryDisconnectionRequest')->name('171klnetwork.corejob.store-temporary-disconnection.request');


    // Core Jobs
    Route::resource('core-jobs', 'CoreJobController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Ont Jobs
    Route::resource('ont-jobs', 'OntJobController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Oso Reports
    Route::resource('oso-reports', 'OsoReportsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Ims Reports
    Route::resource('ims-reports', 'ImsReportsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Core Job Osos
    Route::resource('core-job-osos', 'CoreJobOsoController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Olt Osos
    Route::resource('olt-osos', 'OltOsoController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Core Job Ims
    Route::resource('core-job-ims', 'CoreJobImsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Ont Job Ims
    Route::resource('ont-job-ims', 'OntJobImsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Job Request Authenticatioins
    Route::resource('job-request-authentications', 'JobRequestAuthenticationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
    Route::resource('job-request-authentications', 'JobRequestAuthenticationController');

    Route::get('job-request-authentication/{id}/authenticate','JobRequestAuthenticationController@authenticate')->name('job-requests.authenticate');
    Route::get('job-request-authentication/{id}/approve','JobRequestAuthenticationController@approve')->name('job-requests.approve');
    Route::get('job-request-authentication/{id}/reject','JobRequestAuthenticationController@reject')->name('job-requests.reject');

    // My Job Requests
    Route::resource('my-job-requests', 'MyJobRequestsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Olts
    Route::delete('olts/destroy', 'OltController@massDestroy')->name('olts.massDestroy');
    Route::post('olts/parse-csv-import', 'OltController@parseCsvImport')->name('olts.parseCsvImport');
    Route::post('olts/process-csv-import', 'OltController@processCsvImport')->name('olts.processCsvImport');
    Route::resource('olts', 'OltController');

    // Tndp Ims Olt Profiles
    Route::delete('tndp-ims-olt-profiles/destroy', 'TndpImsOltProfileController@massDestroy')->name('tndp-ims-olt-profiles.massDestroy');
    Route::post('tndp-ims-olt-profiles/media', 'TndpImsOltProfileController@storeMedia')->name('tndp-ims-olt-profiles.storeMedia');
    Route::post('tndp-ims-olt-profiles/ckmedia', 'TndpImsOltProfileController@storeCKEditorImages')->name('tndp-ims-olt-profiles.storeCKEditorImages');
    Route::post('tndp-ims-olt-profiles/parse-csv-import', 'TndpImsOltProfileController@parseCsvImport')->name('tndp-ims-olt-profiles.parseCsvImport');
    Route::post('tndp-ims-olt-profiles/process-csv-import', 'TndpImsOltProfileController@processCsvImport')->name('tndp-ims-olt-profiles.processCsvImport');
    Route::resource('tndp-ims-olt-profiles', 'TndpImsOltProfileController');

    // Oso Olt Jobs
    Route::resource('oso-olt-jobs', 'OsoOltJobController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Olt Job Requests
    Route::delete('olt-job-requests/destroy', 'OltJobRequestController@massDestroy')->name('olt-job-requests.massDestroy');
    Route::post('olt-job-requests/media', 'OltJobRequestController@storeMedia')->name('olt-job-requests.storeMedia');
    Route::post('olt-job-requests/ckmedia', 'OltJobRequestController@storeCKEditorImages')->name('olt-job-requests.storeCKEditorImages');
    Route::post('olt-job-requests/parse-csv-import', 'OltJobRequestController@parseCsvImport')->name('olt-job-requests.parseCsvImport');
    Route::post('olt-job-requests/process-csv-import', 'OltJobRequestController@processCsvImport')->name('olt-job-requests.processCsvImport');
    Route::resource('olt-job-requests', 'OltJobRequestController');

    // Call Source Codes
    Route::delete('call-source-codes/destroy', 'CallSourceCodeController@massDestroy')->name('call-source-codes.massDestroy');
    Route::post('call-source-codes/parse-csv-import', 'CallSourceCodeController@parseCsvImport')->name('call-source-codes.parseCsvImport');
    Route::post('call-source-codes/process-csv-import', 'CallSourceCodeController@processCsvImport')->name('call-source-codes.processCsvImport');
    Route::resource('call-source-codes', 'CallSourceCodeController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('user-alerts/read', 'UserAlertsController@read');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
