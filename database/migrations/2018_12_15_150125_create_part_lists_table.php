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
        Schema::create('build_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 100);
            $table->integer('user_id')->nullable();
            $table->integer('case_id')->nullable();
            $table->integer('cooler_id')->nullable();
            $table->integer('cpu_id')->nullable();
            $table->integer('gpu_id')->nullable();
            $table->integer('motherboard_id')->nullable();
            $table->integer('powersupply_id')->nullable();
            $table->integer('ram_id')->nullable();
            $table->integer('storage_id')->nullable();
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
