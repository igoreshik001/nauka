<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //new
        Schema::create('numbers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('random_n');
            $table->bigInteger('D_N');
            $table->json('n_100');
            $table->json('d_100');
            $table->json('d_minus_100');
            $table->float('D_plus', 5, 5);
            $table->float('D_minus', 5, 5);
            $table->float('D_max', 5, 5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numbers');
    }
}
