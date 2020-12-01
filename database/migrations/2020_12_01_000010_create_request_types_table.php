<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTypesTable extends Migration
{
    public function up()
    {
        Schema::create('request_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
