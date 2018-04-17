<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_category', function (Blueprint $table) {
            $table->unsignedInteger('book_id')->reference('id')->on('books');
            $table->unsignedInteger('category_id')->reference('id')->on('categories');
        });

        DB::table('book_category')->insert([
            'book_id' => '1',            
            'category_id' => '1',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_category');
    }
}
