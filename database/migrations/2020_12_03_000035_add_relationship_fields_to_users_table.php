<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->foreign('designation_id', 'designation_fk_2649186')->references('id')->on('designations');
            $table->unsignedBigInteger('payroll_emp_id')->nullable();
            $table->foreign('payroll_emp_id', 'payroll_emp_fk_2664198')->references('id')->on('employees');
            $table->unsignedBigInteger('call_source_code_id')->nullable();
            $table->foreign('call_source_code_id', 'call_source_code_fk_2713030')->references('id')->on('call_source_codes');
        });
    }
}
