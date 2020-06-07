<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Seo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tager_seo_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('open_graph_title')->nullable();
            $table->text('open_graph_description')->nullable();
            $table->unsignedTinyInteger('open_graph_image_id')->nullable();
            $table->timestamps();

            if (Schema::hasTable('files')) {
                $table->foreign('open_graph_image_id')->references('id')->on('files');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tager_seo_pages');
    }
}
