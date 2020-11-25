<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsoAgwsTable extends Migration
{
    public function up()
    {
        Schema::create('oso_agws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip')->unique();
            $table->string('name')->nullable();
            $table->string('is_active');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
