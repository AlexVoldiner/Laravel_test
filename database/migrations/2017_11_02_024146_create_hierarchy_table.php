<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHierarchyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hierarchy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 25);
            $table->string('position', 25);
            $table->dateTime('start_date');
            $table->integer('salary');
            $table->integer('dir_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hierarchy');
    }
}
