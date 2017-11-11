<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditShowcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('showcases', function (Blueprint $table) {
            $table->text('header_photo')->after('body')->nullable();
            $table->text('thumbnail')->after('body')->nullable();
            $table->text('region')->after('body')->nullable();
            $table->text('fishery_type')->after('body')->nullable();
            $table->text('tagline')->after('body')->nullable();
            $table->text('sidebar_top')->after('body')->nullable();
            $table->text('sidebar_bottom')->after('body')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showcases');
    }
}
