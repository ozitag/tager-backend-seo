<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TagerSeoTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tager_seo_templates', function (Blueprint $table) {
            $table->id();

            $table->string('template')->unique();

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('open_graph_image_id')->nullable();

            $table->foreign('open_graph_image_id')->references('id')->on('files');
        });

        Schema::table('tager_seo_pages', function (Blueprint $table) {
            $table->dropForeign('tager_seo_pages_open_graph_image_id_foreign');

            $table->drop();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tager_seo_templates');
    }
}
