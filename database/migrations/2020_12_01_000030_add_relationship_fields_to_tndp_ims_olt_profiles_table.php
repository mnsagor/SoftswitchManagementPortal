<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTndpImsOltProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('tndp_ims_olt_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('olt_name_id');
            $table->foreign('olt_name_id', 'olt_name_fk_2689398')->references('id')->on('olts');
            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id', 'job_type_fk_2689400')->references('id')->on('job_types');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_2689409')->references('id')->on('job_request_statuses');
        });
    }
}
