<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 100)->nullable();
            $table->enum('type', array('case', 'cooler', 'cpu', 'gpu', 'motherboard', 'powersupply', 'ram', 'storage'))->nullable();
            $table->longText('specs')->nullable();
            $table->char('socket', 100)->nullable();
            $table->float('price')->nullable();
            $table->integer('stock')->nullable();
            $table->char('image', 100)->nullable();
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
        Schema::dropIfExists('parts');
    }
}
