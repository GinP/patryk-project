<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('category_id')
                ->references('id')->on('categories');
            $table->string('title');
            $table->string('descriprion');
            $table->unsignedFloat('price');
            $table->boolean('negotiation');
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
        Schema::dropIfExists('adverts');
    }
}
