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
            $table->integer('team_id')->unsigned();
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 11, 8);
            $table->string('name');
            $table->longText('description');
        });

        Schema::table('packages', function(Blueprint $table){
            $table->integer('destination_id')->unsigned();
            $table->integer('min_anglers')->unsigned()->nullable();
            $table->integer('max_anglers')->unsigned()->nullable();
            $table->string('type');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('price_per_angler');
            $table->integer('percent_deposit_per_angler')->nullable();
            $table->longText('terms')->nullable(); //store as json object for configurability.
            $table->longText('misc_fees')->nullable(); //store as json object for configurability.
            $table->longText('dates_available')->nullable(); //store as json object for configurability.
        });

        Schema::table('expeditions', function(Blueprint $table){
            $table->integer('package_id');
            $table->string('type');
            $table->integer('num_days');
            $table->longText('description');
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
