<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->char('name' , 25)->nullable();
            $table->char('image')->nullable();
            $table->char('age', 8)->nullable();
            $table->char('status', 8);
            $table->char('gender', 6);
            $table->char('species', 10);
            $table->char('size', 7);
            $table->char('health' , 255)->nullable();
            $table->char('personality' , 255)->nullable();
            $table->string('description' , 1000)->nullable();
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
        Schema::dropIfExists('animals');
    }
};
