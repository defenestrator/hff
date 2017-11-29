<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTeamIdToOutfitterIdOnDestinations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinations', function(Blueprint $table)
        {
            $table->rename('team_id', 'outfitter_id');
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
            $table->rename('outfitter_id', 'team_id');
        });
    }
}
