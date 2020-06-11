<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Charges', function (Blueprint $table) {
            $table->id();
            $table->string('charge_id');
            $table->float('amount');
            $table->string('auth')->nullable();
            $table->string('currency')->default('MX');
            $table->dateTime('operation_date');
            $table->string('description');
            $table->integer('status');
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
        Schema::dropIfExists('Charges');
    }
}
