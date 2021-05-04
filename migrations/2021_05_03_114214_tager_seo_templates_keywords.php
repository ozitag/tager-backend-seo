<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TagerSeoTemplatesKeywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tager_seo_templates', function (Blueprint $table) {
            $table->string('keywords')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tager_seo_templates', function (Blueprint $table) {
            $table->dropColumn('keywords')->after('description')->nullable();
        });
    }
}
