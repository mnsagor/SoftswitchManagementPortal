<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOltJobRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('olt_job_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('network_type_id');
            $table->foreign('network_type_id', 'network_type_fk_2689920')->references('id')->on('network_types');
            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id', 'job_type_fk_2689949')->references('id')->on('job_types');
            $table->unsignedBigInteger('request_type_id');
            $table->foreign('request_type_id', 'request_type_fk_2689950')->references('id')->on('request_types');
            $table->unsignedBigInteger('request_status_id');
            $table->foreign('request_status_id', 'request_status_fk_2689951')->references('id')->on('job_request_statuses');
            $table->unsignedBigInteger('olt_ip_id');
            $table->foreign('olt_ip_id', 'olt_ip_fk_2689952')->references('id')->on('olts');
            $table->unsignedBigInteger('requested_by_id');
            $table->foreign('requested_by_id', 'requested_by_fk_2689959')->references('id')->on('users');
            $table->unsignedBigInteger('verified_by_id')->nullable();
            $table->foreign('verified_by_id', 'verified_by_fk_2689961')->references('id')->on('users');
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->foreign('approved_by_id', 'approved_by_fk_2689963')->references('id')->on('users');
            $table->unsignedBigInteger('rejected_by_id')->nullable();
            $table->foreign('rejected_by_id', 'rejected_by_fk_2689966')->references('id')->on('users');
        });
    }
}
