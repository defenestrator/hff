<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterShowcases extends Migration
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
            $table->renameColumn('region', 'homepage_bottom');
            $table->renameColumn('fishery_type', 'homepage_top');
            $table->unsignedInteger('region_id')->after('slug')->default(0);
            $table->unsignedInteger('destination_id')->after('slug')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('destinations', function(Blueprint $table)
        {
            $table->renameColumn('homepage_bottom', 'region');
            $table->renameColumn('homepage_top', 'fishery_type');
            $table->dropColumn('region_id');
            $table->dropColumn('destination_id');
        });
    }
}
