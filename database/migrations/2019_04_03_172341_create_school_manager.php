<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_manager', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->nullable()->unsigned();
            $table->integer('role_id')->nullable()->unsigned();
            $table->integer('access_criteria_id')->nullable()->unsigned();
            $table->string('access_criteria_description')->nullable();
            $table->integer('link_type_id')->nullable()->unsigned();
            $table->boolean('chief')->default(false);
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('manager_roles');
            $table->foreign('access_criteria_id')->references('id')->on('manager_access_criterias');
            $table->foreign('link_type_id')->references('id')->on('manager_link_types');
            $table->foreign('school_id')->references('cod_escola')->on('pmieducar.escola');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_manager');
    }
}
