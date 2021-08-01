<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->unsignedInteger('country_id')->nullable();
            $table->integer('code')->nullable();
            $table->string('flag')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('model_has_country', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->softDeletes();
            $table->foreignid('book_id')->nullable()->constrained('books')->onUpdate('CASCADE')->cascadeOnDelete();
            $table->foreignid('user_id')->nullable()->constrained('users')->onUpdate('CASCADE')->cascadeOnDelete();
            $table->foreignid('country_id')->nullable()->constrained('country')->onUpdate('CASCADE')->cascadeOnDelete();
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

        Schema::dropIfExists('country');
        Schema::dropIfExists('model_has_country');
    }
}
