<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('job_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('network_type_id');
            $table->foreign('network_type_id', 'network_type_fk_2660935')->references('id')->on('network_types');
            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id', 'job_type_fk_2660936')->references('id')->on('job_types');
            $table->unsignedBigInteger('request_type_id');
            $table->foreign('request_type_id', 'request_type_fk_2660937')->references('id')->on('request_types');
            $table->unsignedBigInteger('request_status_id');
            $table->foreign('request_status_id', 'request_status_fk_2660938')->references('id')->on('job_request_statuses');
            $table->unsignedBigInteger('requested_by_id');
            $table->foreign('requested_by_id', 'requested_by_fk_2660944')->references('id')->on('users');
            $table->unsignedBigInteger('verified_by_id')->nullable();
            $table->foreign('verified_by_id', 'verified_by_fk_2660946')->references('id')->on('users');
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->foreign('approved_by_id', 'approved_by_fk_2660948')->references('id')->on('users');
            $table->unsignedBigInteger('rejected_by_id')->nullable();
            $table->foreign('rejected_by_id', 'rejected_by_fk_2660951')->references('id')->on('users');
        });
    }
}
