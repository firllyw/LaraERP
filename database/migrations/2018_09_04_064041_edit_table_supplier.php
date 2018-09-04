<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->text('detail');
            $table->string('address');
            $table->unsignedInteger('status_id');
            $table->string('phone');
            $table->string('representative');
            $table->string('representative_position');
            $table->string('documents')->nullable();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('province_id');
            $table->unsignedInteger('city_id');

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            //
        });
    }
}
