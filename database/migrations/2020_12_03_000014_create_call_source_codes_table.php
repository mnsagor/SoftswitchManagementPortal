<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallSourceCodesTable extends Migration
{
    public function up()
    {
        Schema::create('call_source_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
