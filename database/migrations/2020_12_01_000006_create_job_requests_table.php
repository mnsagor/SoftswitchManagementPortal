<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('job_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->string('agw_ip');
            $table->string('tid');
            $table->longText('note')->nullable();
            $table->datetime('request_time')->nullable();
            $table->datetime('verification_time')->nullable();
            $table->datetime('approval_time')->nullable();
            $table->longText('approval_note')->nullable();
            $table->datetime('rejection_time')->nullable();
            $table->longText('rejection_note')->nullable();
            $table->longText('script')->nullable();
            $table->string('is_force_request')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
