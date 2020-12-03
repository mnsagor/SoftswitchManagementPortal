<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCallSourceCodesTable extends Migration
{
    public function up()
    {
        Schema::table('call_source_codes', function (Blueprint $table) {
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id', 'zone_fk_2712870')->references('id')->on('offices');
        });
    }
}
