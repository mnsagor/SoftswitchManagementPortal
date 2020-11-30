<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTndpImsOltProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('tndp_ims_olt_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('device_type');
            $table->string('no_of_ports')->nullable();
            $table->string('serial_number')->unique();
            $table->string('interface');
            $table->string('ip');
            $table->string('number')->unique();
            $table->string('port_number');
            $table->string('service');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
