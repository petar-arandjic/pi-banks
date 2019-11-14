<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Name of bank
            $table->string('name');
            //Bank account
            $table->bigInteger('bank_account_id');
            //allowed_overdraft
            $table->double('allowed_overdraft', 8, 4);
            //starting balance
            $table->double('starting_balance', 8, 4);
            //Determinate if bank transaction will be shown of on main container
            $table->boolean('show')->default(false);
            //style and colors for bank |table
            $table->bigInteger('style_id');

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
        Schema::dropIfExists('banks');
    }
}
