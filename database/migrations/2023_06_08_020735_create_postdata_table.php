<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postdata', function (Blueprint $table) {
            $table->id();
            $table->int('student_id')->unique();
            $table->string('title');
            $table->string('image');
            $table->string('message');
            $table->int('status');
            $table->int('postdata_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postdata');
    }
}
