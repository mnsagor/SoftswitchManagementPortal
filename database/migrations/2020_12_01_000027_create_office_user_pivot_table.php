<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('office_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_2648928')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id', 'office_id_fk_2648928')->references('id')->on('offices')->onDelete('cascade');
        });
    }
}
