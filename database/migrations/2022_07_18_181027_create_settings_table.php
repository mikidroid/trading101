<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('logo_url');
            $table->string('admin_email');
            $table->bigInteger('deposit_min');
            $table->bigInteger('deposit_max');
            $table->bigInteger('withdrawal_min');
            $table->bigInteger('withdrawal_max');
            //frequency in hours
            $table->bigInteger('interest_frequency');
            $table->bigInteger('interest_percentage');
            //duration in days
            $table->bigInteger('investment_duration');
            $table->bigInteger('investment_min');
            $table->bigInteger('investment_max');
            $table->bigInteger('lottery_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
