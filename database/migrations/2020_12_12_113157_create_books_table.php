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
            $table->increments('id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            //$table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->string('judul');
            $table->string('slug');
            $table->string('cover');
            $table->string('file_path');
            $table->integer('view_count')->default(0);
            $table->text('ringkasan');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('jml_halaman');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
           
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
