<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOltJobRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('olt_job_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->unique();
            $table->string('interface');
            $table->string('service_type');
            $table->string('port_number');
            $table->longText('note')->nullable();
            $table->datetime('request_time')->nullable();
            $table->datetime('verification_time')->nullable();
            $table->datetime('approval_time')->nullable();
            $table->longText('approval_note')->nullable();
            $table->datetime('rejection_time')->nullable();
            $table->longText('rejection_note')->nullable();
            $table->longText('script')->nullable();
            $table->string('device_ip')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
