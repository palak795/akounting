<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return `
     */
    public function up()
    {
        Schema::create('_revenues', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('amount');
            $table->string('account');
            $table->string('customer');
            $table->string('description');
            $table->string('category');
            $table->string('recurring');
            $table->string('payment_method');
            $table->string('reference');
            $table->string('attachment');
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
        Schema::dropIfExists('_revenues');
    }
}
