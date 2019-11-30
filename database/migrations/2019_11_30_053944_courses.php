<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('training_method');
            $table->string('batch');
            $table->string('language');
            $table->string('level');
            $table->string('partner') ->nullable();
            $table->string('address') ->nullable();
            $table->datetime('from_Datetime')->nullable();
            $table->datetime('to_datetime')->nullable();
            $table->boolean('isRepeat') ->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
