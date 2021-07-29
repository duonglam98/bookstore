<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default(1);
            $table->string('name');
            $table->string('author');
            $table->string('code');
            // Relationship field
            // $table->integer('category_id')->unsigned();
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->string('category');
            $table->float('price', 8, 2);
            // $table->string('sub_name')->unsigned();
            $table->integer('quantity');
            $table->text('description')->nullable();
            $table->string('image');
            $table->integer('reviews')->default(5);
            $table->float('weight', 8, 2)->nullable();
            $table->string('NXB');
            $table->tinyInteger('status')->default(1);
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