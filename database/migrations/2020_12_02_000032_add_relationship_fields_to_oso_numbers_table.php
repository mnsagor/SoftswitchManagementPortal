<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOsoNumbersTable extends Migration
{
    public function up()
    {
        Schema::table('oso_numbers', function (Blueprint $table) {
            $table->unsignedBigInteger('agw_ip_id');
            $table->foreign('agw_ip_id', 'agw_ip_fk_2648934')->references('id')->on('oso_agws');
        });
    }
}
