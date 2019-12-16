<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('workers');
            $table->integer('purchases');
            $table->double('salary', 8, 2);
            $table->double('income', 8, 2);
            $table->double('pure_income', 8, 2);
            $table->double('spent', 8, 2);
            $table->double('product', 8, 2);
            $table->double('vyrob', 8, 2);
            $table->double('trudo', 8, 2);
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
        Schema::dropIfExists('archives');
    }
}
