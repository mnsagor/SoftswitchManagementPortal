<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTndpImsAgwsTable extends Migration
{
    public function up()
    {
        Schema::table('tndp_ims_agws', function (Blueprint $table) {
            $table->unsignedBigInteger('office_id')->nullable();
            $table->foreign('office_id', 'office_fk_2648924')->references('id')->on('offices');
        });
    }
}
