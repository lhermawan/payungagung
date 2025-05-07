<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTLapakdesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_lapakdesa', function (Blueprint $table) {
            $table->id(); // Adds an auto-incrementing UNSIGNED BIGINT (primary key)
            $table->string('nama_produk');
            $table->decimal('harga', 15, 2); // Adjust precision and scale as needed
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->string('mitra');
            $table->string('link_wa')->nullable();
            $table->string('link_maps')->nullable();
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
        Schema::dropIfExists('t_lapakdesa');
    }
}
