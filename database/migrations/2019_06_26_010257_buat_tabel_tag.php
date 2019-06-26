<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('slug');
            $table->timestamps();
        });
         Schema::create('artikel_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('artikel_id');
            $table->foreign('artikel_id')->references('id')->on('artikels')->onDelete('CASCADE');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('CASCADE');
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
         Schema::dropIfExists('tags');
        Schema::dropIfExists('artikel_tag');
    }
}
