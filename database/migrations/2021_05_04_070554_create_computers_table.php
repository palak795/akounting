<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('brand');
            $table->date('date_of_manufacture');
            $table->string('ram');
            $table->string('processor')->nullable();
            $table->string('display')->nullable();
            $table->string('accessories')->nullable();
            $table->string('warranty')->nullable();
            $table->string('description')->nullable();
            $table->string('storage')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('computers');
    }
}
