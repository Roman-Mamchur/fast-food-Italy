<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delevery_areas', function (Blueprint $table) {
            $table->id();
            $table->string('area_name')->nullable();
            $table->string('max_time')->nullable();
            $table->string('min_time')->nullable();
            $table->double('fee')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('delevery_areas');
    }
};
