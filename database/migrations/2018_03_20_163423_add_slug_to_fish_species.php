<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToFishSpecies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fish_species', function(Blueprint $table) {
            $table->string('slug')->after('common_name')->nullable()->unique();
            $table->string('header_photo')->after('common_name')->default('https://hobo-assets.s3-us-west-2.amazonaws.com/images/dd15471bfc9041829b5bf5eda3600c11.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
