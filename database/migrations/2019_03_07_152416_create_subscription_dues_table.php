<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_dues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('subscription_id');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('fee');
            $table->unsignedInteger('due');
            $table->date('pay_at')->nullable();
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('subscription_dues');
    }
}
