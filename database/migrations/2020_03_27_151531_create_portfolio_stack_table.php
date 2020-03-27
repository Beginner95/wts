<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioStackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_stack', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('portfolio_id')->unsigned();
            $table->bigInteger('stack_id')->unsigned();
            $table->foreign('portfolio_id')->references('id')->on('portfolios');
            $table->foreign('stack_id')->references('id')->on('stack');
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
        Schema::dropIfExists('portfolio_stack');
    }
}
