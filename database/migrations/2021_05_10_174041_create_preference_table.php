<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preference', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('mode')->nullable();
            $table->string('18+')->nullable();
            $table->string('data_saver')->nullable();
            $table->foreignId('user_id')->constrained('users')->onUpdate('CASCADE');
            $table->boolean('auto_unlock_chapter')->default(0);
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
        Schema::dropIfExists('preference');
    }
}
