<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToVariousTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('destinations', function (Blueprint $table) {
            $table->integer('team_id')->unsigned()->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
        });

        Schema::table('packages', function(Blueprint $table){
            $table->integer('destination_id')->unsigned()->nullable();
            $table->integer('min_anglers')->unsigned()->nullable();
            $table->integer('max_anglers')->unsigned()->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->integer('price_per_angler')->nullable();
            $table->integer('percent_deposit_per_angler')->nullable();
            $table->longText('terms')->nullable(); //store as json object for configurability.
            $table->longText('misc_fees')->nullable(); //store as json object for configurability.
            $table->longText('dates_available')->nullable(); //store as json object for configurability.
        });

        Schema::table('expeditions', function(Blueprint $table){
            $table->integer('package_id')->nullable();
            $table->string('type')->nullable();
            $table->integer('num_days')->nullable();
            $table->longText('description')->nullable();
        });
        Schema::table('newsletter_subscriptions', function(Blueprint $table) {
            $table->boolean('confirmed')->after('email_address')->default(false);
            $table->string('token')->after('email_address')->nullable();
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
