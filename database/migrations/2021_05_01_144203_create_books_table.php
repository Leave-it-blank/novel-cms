<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('title_slug');
            $table->string('Description')->nullable();
            $table->string('url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->softDeletes();
            $table->boolean('hidden')->default(0);
            $table->boolean('is_novel')->default(0);
            $table->boolean('mature')->default(0);
            $table->boolean('locked')->default(0);
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
        Schema::dropIfExists('books');
    }
}
