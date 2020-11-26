<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOfficesTable extends Migration
{
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id', 'region_fk_2641637')->references('id')->on('regions');
        });
    }
}
