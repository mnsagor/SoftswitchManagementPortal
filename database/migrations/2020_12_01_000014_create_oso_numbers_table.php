<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsoNumbersTable extends Migration
{
    public function up()
    {
        Schema::create('oso_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->unique();
            $table->string('tid');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
