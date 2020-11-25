<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOsoNumberProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('oso_number_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('number_id');
            $table->foreign('number_id', 'number_fk_2648941')->references('id')->on('oso_numbers');
        });
    }
}
