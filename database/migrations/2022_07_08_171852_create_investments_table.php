<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email');
            $table->string('name');
            $table->foreignId('user_id');
            $table->bigInteger('amount');
            $table->string('ref');
            $table->string('start_date');
            $table->string('end_date');
            $table->bigInteger('interest')->nullable(true);
            //duration in days
            $table->integer('duration')->nullable(true);
            $table->boolean('status')->default(0);
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
    }
}
