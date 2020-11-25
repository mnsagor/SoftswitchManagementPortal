<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobRequestStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('job_request_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
