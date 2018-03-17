<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHeaderPhotoToRegionsAndDestinations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->string('header_photo')->after('name')->default('https://images.fireside.fm/podcasts/images/e/e806aded-313d-462f-9181-8447502bda33/episodes/3/3c5758b3-7c00-4221-b3f8-8636e5c36448/header.jpg');
        });
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('header_photo')->after('name')->default('https://images.fireside.fm/podcasts/images/e/e806aded-313d-462f-9181-8447502bda33/episodes/3/3c5758b3-7c00-4221-b3f8-8636e5c36448/header.jpg');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
        Schema::dropIfExists('destinations');
    }
}
