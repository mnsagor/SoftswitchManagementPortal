<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTndpImsNumbersTable extends Migration
{
    public function up()
    {
        Schema::table('tndp_ims_numbers', function (Blueprint $table) {
            $table->unsignedBigInteger('agw_ip_id');
            $table->foreign('agw_ip_id', 'agw_ip_fk_2702099')->references('id')->on('tndp_ims_agws');
        });
    }
}
