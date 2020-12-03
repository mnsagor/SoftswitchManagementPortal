<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsoNumberProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('oso_number_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('is_active')->nullable();
            $table->string('is_td')->nullable();
            $table->string('is_isd')->nullable();
            $table->string('is_eisd')->nullable();
            $table->string('is_pbx')->nullable();
            $table->string('pbx_poilot_number')->nullable();
            $table->string('oso_number')->nullable();
            $table->string('request_controller')->nullable();
            $table->string('is_queued')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
