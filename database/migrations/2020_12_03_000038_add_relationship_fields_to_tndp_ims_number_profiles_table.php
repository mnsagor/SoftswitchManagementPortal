<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTndpImsNumberProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('tndp_ims_number_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('number_id');
            $table->foreign('number_id', 'number_fk_2649090')->references('id')->on('tndp_ims_numbers');
            $table->unsignedBigInteger('tndp_agw_ip_id');
            $table->foreign('tndp_agw_ip_id', 'tndp_agw_ip_fk_2702114')->references('id')->on('tndp_ims_agws');
        });
    }
}
