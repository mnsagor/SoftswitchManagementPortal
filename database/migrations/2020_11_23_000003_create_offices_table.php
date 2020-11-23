<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('is_active')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
