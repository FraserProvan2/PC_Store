<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 100);
            $table->integer('user_id')->nullable();
            $table->integer('case_id')->default(0)->nullable();
            $table->integer('coolder_id')->default(0)->nullable();
            $table->integer('cpu_id')->default(0)->nullable();
            $table->integer('gpu_id')->default(0)->nullable();
            $table->boolean('add_card')->default(0)->nullable();
            $table->integer('mobo_id')->default(0)->nullable();
            $table->integer('powersupply_id')->default(0)->nullable();
            $table->integer('ram_id')->default(0)->nullable();
            $table->integer('storage_id')->default(0)->nullable();
            $table->integer('total')->default(0);
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
        Schema::dropIfExists('part_lists');
    }
}
