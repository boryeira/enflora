<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('lotes', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->unsignedInteger('strain_id');
             $table->string('code');
             $table->unsignedInteger('quantity');
             $table->unsignedInteger('consumed');
             $table->unsignedInteger('status');
             $table->longText('details')->nullable();
             $table->date('storage_at');
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
        Schema::dropIfExists('lotes');
    }
}
