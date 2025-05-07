<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_berita', function (Blueprint $table) {
            $table->id(); // Adds an auto-incrementing UNSIGNED BIGINT (primary key)
            $table->string('heading');
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->string('image')->nullable(); // Added image column
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_berita');
    }
}
