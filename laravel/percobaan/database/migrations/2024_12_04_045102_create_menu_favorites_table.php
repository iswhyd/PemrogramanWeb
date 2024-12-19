<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('menu_favorites', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('gambar');
            $table->string('link_whatsapp');
            $table->string('link_gofood');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_favorites');
    }
}
