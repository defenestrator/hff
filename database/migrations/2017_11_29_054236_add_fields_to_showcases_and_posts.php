<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToShowcasesAndPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function(Blueprint $table)
        {
            $table->string('header_photo')->default('')->after('body');
        });

        Schema::table('showcases', function(Blueprint $table)
        {
            $table->string('lodge_logo')->default('')->after('header_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table)
        {
            $table->dropColumn('header_photo');
        });
        Schema::table('posts', function(Blueprint $table)
        {
            $table->dropColumn('lodge_logo');
        });
    }
}
