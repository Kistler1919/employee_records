<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('first_name');
            $table->string('address');

            $table->unsignedBigInteger('department_id')->index();
            $table->foreign('department_id')->references('id')->on('departments');

            $table->unsignedBigInteger('country_id')->index();
            $table->foreign('country_id')->references('id')->on('countries');

            $table->unsignedBigInteger('state_id')->index();
            $table->foreign('state_id')->references('id')->on('states');

            $table->unsignedBigInteger('city_id')->index();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->string('zip_code');
            $table->string('birthdate')->nullable();
            $table->string('date_hired')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
