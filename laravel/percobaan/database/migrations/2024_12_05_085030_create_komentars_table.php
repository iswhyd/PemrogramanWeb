<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id(); // ID otomatis
            $table->string('nama');
            $table->text('isikomentar');
            $table->timestamps(); // Tanggal otomatis (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
