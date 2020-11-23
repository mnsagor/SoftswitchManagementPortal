<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
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

    // Emplpyees
    Route::delete('emplpyees/destroy', 'EmplpyeeController@massDestroy')->name('emplpyees.massDestroy');
    Route::post('emplpyees/parse-csv-import', 'EmplpyeeController@parseCsvImport')->name('emplpyees.parseCsvImport');
    Route::post('emplpyees/process-csv-import', 'EmplpyeeController@processCsvImport')->name('emplpyees.processCsvImport');
    Route::resource('emplpyees', 'EmplpyeeController');

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
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

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
    Route::resource('regions', 'RegionController');

    // Designations
    Route::delete('designations/destroy', 'DesignationController@massDestroy')->name('designations.massDestroy');
    Route::resource('designations', 'DesignationController');

    // Offices
    Route::delete('offices/destroy', 'OfficeController@massDestroy')->name('offices.massDestroy');
    Route::resource('offices', 'OfficeController');

    // Emplpyees
    Route::delete('emplpyees/destroy', 'EmplpyeeController@massDestroy')->name('emplpyees.massDestroy');
    Route::resource('emplpyees', 'EmplpyeeController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});