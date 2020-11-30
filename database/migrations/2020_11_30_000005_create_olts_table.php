<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOltsTable extends Migration
{
    public function up()
    {
        Schema::create('olts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('ip')->unique();
            $table->string('vlan')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
