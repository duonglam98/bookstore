<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('book_orders')) {
            Schema::create('book_orders', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('book_id');
                $table->string('image');
                $table->bigInteger('order_id');
                $table->integer('quantity');
                $table->integer('price');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('book_orders')) {
            Schema::dropIfExists('book_orders');
        }
    }
}
