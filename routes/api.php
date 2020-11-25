<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Regions
    Route::apiResource('regions', 'RegionApiController');

    // Designations
    Route::apiResource('designations', 'DesignationApiController');

    // Offices
    Route::apiResource('offices', 'OfficeApiController');

    // Oso Agws
    Route::post('oso-agws/media', 'OsoAgwApiController@storeMedia')->name('oso-agws.storeMedia');
    Route::apiResource('oso-agws', 'OsoAgwApiController');

    // Tndp Ims Agws
    Route::post('tndp-ims-agws/media', 'TndpImsAgwApiController@storeMedia')->name('tndp-ims-agws.storeMedia');
    Route::apiResource('tndp-ims-agws', 'TndpImsAgwApiController');

    // Oso Numbers
    Route::apiResource('oso-numbers', 'OsoNumbersApiController');

    // Oso Number Profiles
    Route::apiResource('oso-number-profiles', 'OsoNumberProfileApiController');

    // Tndp Ims Numbers
    Route::apiResource('tndp-ims-numbers', 'TndpImsNumbersApiController');

    // Tndp Ims Number Profiles
    Route::apiResource('tndp-ims-number-profiles', 'TndpImsNumberProfileApiController');

    // Employees
    Route::apiResource('employees', 'EmployeeApiController');

    // Request Types
    Route::apiResource('request-types', 'RequestTypeApiController');

    // Job Request Statuses
    Route::apiResource('job-request-statuses', 'JobRequestStatusApiController');

    // Network Types
    Route::apiResource('network-types', 'NetworkTypeApiController');

    // Job Types
    Route::apiResource('job-types', 'JobTypeApiController');

    // Job Requests
    Route::post('job-requests/media', 'JobRequestApiController@storeMedia')->name('job-requests.storeMedia');
    Route::apiResource('job-requests', 'JobRequestApiController');
});
