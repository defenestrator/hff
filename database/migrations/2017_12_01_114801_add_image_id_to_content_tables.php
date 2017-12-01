<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageIdToContentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('showcases', function(Blueprint $table)
        {
            $table->unsignedInteger('image_id')->after('lodge_logo')->default(0);
        });
        Schema::table('posts', function(Blueprint $table)
        {
            $table->unsignedInteger('image_id')->after('header_photo')->default(0);
        });
        Schema::table('fly_patterns', function(Blueprint $table)
        {
            $table->renameColumn('privacy_id', 'image_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('showcases', function(Blueprint $table)
        {
            $table->dropColumn('image_id');
        });
        Schema::table('posts', function(Blueprint $table)
        {
            $table->dropColumn('image_id');
        });
        Schema::table('fly_patterns', function(Blueprint $table)
        {
            $table->renameColumn('image_id','privacy_id');
        });
    }
}
