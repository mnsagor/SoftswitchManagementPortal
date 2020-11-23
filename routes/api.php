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

    // Emplpyees
    Route::apiResource('emplpyees', 'EmplpyeeApiController');
});
