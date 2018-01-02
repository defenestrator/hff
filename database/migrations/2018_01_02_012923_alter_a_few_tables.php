<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAFewTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->decimal('lng', 11,8)->nullable()->change();
        });

        Schema::table('fisheries', function (Blueprint $table) {
            $table->decimal('lng', 11,8)->nullable()->change();
            $table->decimal('lat', 10,7)->nullable()->change();
            $table->longText('geojson')->nullable();

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
        Schema::dropIfExists('fisheries');
    }
}
