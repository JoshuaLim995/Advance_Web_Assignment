<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('isbn', 100)->unique();
            $table->string('title', 100)->index();
            $table->text('synopsis')->nullable();
            $table->string('author', 100)->index();
            $table->string('edition', 50)->index();
            $table->char('edition_year', 4)->index();
            $table->timestamps();
        });

        DB::table('books')->insert([
            'isbn' => '9780769026268',
            'title' => 'Jumanji',
            'synopsis' => "A magical board game unleashes a world of adventure on siblings Peter (Bradley Pierce) and Judy Shepherd (Kirsten Dunst). While exploring an old mansion, the youngsters find a curious, jungle-themed game called Jumanji in the attic. When they start playing, they free Alan Parrish (Robin Williams), who's been stuck in the game's inner world for decades. If they win Jumanji, the kids can free Alan for good -- but that means braving giant bugs, ill-mannered monkeys and even stampeding rhinos!",
            'author' => 'Chris Van Allsburg',
            'edition' => '1st',
            'edition_year' => '1981',
            ]);
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
