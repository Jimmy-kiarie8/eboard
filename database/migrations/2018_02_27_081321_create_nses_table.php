<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parent_group');
            $table->string('group_name');
            $table->boolean('evaluated');
            $table->boolean('meeting_group');
            $table->boolean('cont_manage');
            $table->boolean('restrict');
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
        Schema::dropIfExists('nses');
    }
}
