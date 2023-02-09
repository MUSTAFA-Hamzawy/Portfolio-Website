<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolg', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title', 150);
            $table->string('image')->nullable();
            $table->text('post_description');
            $table->string('tags');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('blog_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bolg');
    }
};
