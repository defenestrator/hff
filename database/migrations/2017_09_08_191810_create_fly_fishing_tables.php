<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateFlyFishingTables extends Migration
{

    private $tables = [
        'uploads',
        'fisheries',
        'fishery_fish_species',
        'fishery_hatch',
        'fish_species',
        'flyboxes',
        'fly_patterns',
        'habitats',
        'hatches',
        'hatch_reports',
        'hatch_types',
        'maps',
        'prey',
        'privacy',
        'reports',
        'water_data',
        'weather'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privacy', function ($table) {
            $table->increments('id');
            $table->string('privacy');
        });

        Schema::create('hatch_types', function ($table) {
            $table->increments('id');
            $table->string('type');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('habitats', function ($table) {
            $table->increments('id');
            $table->string('habitat');
        });


        Schema::create('maps', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 11, 8);
            $table->integer('zoom');
            $table->string('uri');
            $table->timestamps();
        });

        Schema::create('weather', function ($table) {
            $table->increments('id');
            $table->date('date');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 11, 8);
            $table->text('weather_data');
            $table->timestamps();
        });

        Schema::create('water_data', function ($table) {
            $table->increments('id');
            $table->date('date');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 11, 8);
            $table->text('data');
            $table->timestamps();
        });

        Schema::create('hatches', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('hatch_type_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('uploads', function ($table) {
            $asset_type = array('image', 'video', 'link', 'document', 'other');
            $table->increments('id');
            $table->string('uuid');
            $table->enum('type', $asset_type);
            $table->integer('user_id')->unsigned();
            $table->integer('privacy_id')->unsigned()->default(2);
            $table->string('uri');
            $table->timestamps();
        });

        Schema::create('fisheries', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('regs')->nullable();
            $table->mediumText('management');
            $table->text('notes');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 11, 8);
            $table->integer('habitat_id')->unsigned();
            $table->tinyInteger('stillwater')->default(0);
            $table->timestamps();
        });

        Schema::create('reports', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('fishery_id')->unsigned();
            $table->date('start_time');
            $table->date('end_time');
            $table->string('title');
            $table->text('report_body');
            $table->integer('privacy_id')->unsigned()->default(2);
            $table->timestamps();
        });

        Schema::create('hatch_reports', function ($table) {
            $table->increments('id');
            $table->integer('report_id')->unsigned();
            $table->integer('hatch_id')->unsigned()->nullable();
            $table->date('start_time');
            $table->date('end_time');
            $table->string('headline');
            $table->text('hatch_report');
            $table->integer('hatch_intensity')->unsigned();
            $table->timestamps();
        });

        Schema::create('flyboxes', function ($table) {
            $table->increments('id');
            $table->string('flybox_name');
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->integer('privacy_id')->unsigned()->default(2);
            $table->timestamps();
        });

        Schema::create('fish_species', function ($table) {
            $table->increments('id');
            $table->string('common_name');
            $table->string('genus');
            $table->string('species');
            $table->text('description');
            $table->integer('habitat_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('prey', function ($table) {
            $table->increments('id');
            $table->string('common_name')->nullable();
            $table->string('genus');
            $table->string('species');
            $table->text('description')->nullable();
            $table->integer('hatch_type_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('fly_patterns', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->text('recipe');
            $table->text('instructions');
            $table->integer('privacy_id')->unsigned()->default(2);
            $table->timestamps();
        });

        Schema::create('fishery_fish_species', function ($table) {
            $table->integer('fishery_id')->unsigned();
            $table->integer('fish_species_id')->unsigned();
        });

        Schema::create('fishery_hatches', function ($table) {
            $table->integer('fishery_id')->unsigned();
            $table->integer('hatch_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->tables as $tableName) {
            Schema::dropIfExists($tableName);
        }
    }
}

