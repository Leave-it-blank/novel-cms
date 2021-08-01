<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('number')->nullable();
            $table->string('name')->nullable();
            $table->string('Notice')->nullable();
            $table->string('image')->nullable();
            $table->longText('text')->nullable();
            $table->foreignId('chapter_id')->constrained('chapters')->onUpdate('CASCADE');;
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
        Schema::dropIfExists('page');
    }
}
