<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DestroyAllMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('monthly_recurring_revenue');
            $table->decimal('yearly_recurring_revenue');
            $table->decimal('daily_volume');
            $table->integer('new_users');
            $table->timestamps();
            $table->index('created_at');
        });

        Schema::create('announcements', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('user_id');
            $table->text('body');
            $table->string('action_text')->nullable();
            $table->text('action_url')->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->text('photo_url')->nullable();
            $table->tinyInteger('uses_two_factor_auth')->default(0);
            $table->string('authy_id')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('two_factor_reset_code', 100)->nullable();
            $table->integer('current_team_id')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('current_billing_plan')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->string('card_country')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip', 25)->nullable();
            $table->string('billing_country', 2)->nullable();
            $table->string('vat_id', 50)->nullable();
            $table->text('extra_billing_information')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('last_read_announcements_at')->nullable();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('api_tokens', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('user_id');
            $table->string('name');
            $table->string('token', 100)->unique();
            $table->text('metadata');
            $table->tinyInteger('transient')->default(0);
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'expires_at']);
        });

        Schema::create('subscriptions', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('stripe_id');
            $table->string('stripe_plan');
            $table->integer('quantity');
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });

        Schema::create('team_subscriptions', function ($table) {
            $table->increments('id');
            $table->integer('team_id');
            $table->string('name');
            $table->string('stripe_id');
            $table->string('stripe_plan');
            $table->integer('quantity');
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->index();
            $table->integer('team_id')->nullable()->index();
            $table->string('provider_id');
            $table->decimal('total')->nullable();
            $table->decimal('tax')->nullable();
            $table->string('card_country')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('vat_id', 50)->nullable();
            $table->timestamps();

            $table->index('created_at');
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('user_id');
            $table->integer('created_by')->nullable();
            $table->string('icon', 50)->nullable();
            $table->text('body');
            $table->string('action_text')->nullable();
            $table->text('action_url')->nullable();
            $table->tinyInteger('read')->default(0);
            $table->timestamps();

            $table->index(['user_id', 'created_at']);
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->index();
            $table->string('name');
            $table->string('slug')->nullable()->unique();
            $table->text('photo_url')->nullable();
            $table->string('website')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('current_billing_plan')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->string('card_country')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip', 25)->nullable();
            $table->string('billing_country', 2)->nullable();
            $table->string('vat_id', 50)->nullable();
            $table->text('extra_billing_information')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamps();
        });

        Schema::create('team_users', function (Blueprint $table) {
            $table->integer('team_id');
            $table->integer('user_id');
            $table->string('role', 20);

            $table->unique(['team_id', 'user_id']);
        });

        Schema::create('invitations', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('team_id')->index();
            $table->integer('user_id')->nullable()->index();
            $table->string('email');
            $table->string('token', 40)->unique();
            $table->timestamps();
        });

        Schema::create('newsletters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->longText('body');
            $table->date('sent_on');
            $table->timestamps();
        });

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
            $table->integer('zoom')->nullable()->default(11);
            $table->string('uri')->nullable();
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
            $table->integer('image_id')->unsigned()->default(0);
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

        Schema::create('newsletter_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_address');
            $table->boolean('confirmed')->default(false);
            $table->string('token')->nullable();
            $table->timestamps();
        });

        Schema::create('contact_form_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email_address');
            $table->string('message');
            $table->timestamps();
        });

        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('post_id')->nullable();
            $table->integer('podcast_id')->nullable();
            $table->integer('newsletter_id')->nullable();
            $table->integer('showcase_id')->unsigned()->nullable();
            $table->integer('report_id')->nullable();
            $table->boolean('archived')->nullable()->default(false);
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('author');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('body');
            $table->string('header_photo')->default('');
            $table->unsignedInteger('image_id')->default(0);
            $table->timestamps();
        });

        Schema::create('podcasts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('episode');
            $table->integer('season');
            $table->string('file');
            $table->string('cover_image');
            $table->longText('notes');
            $table->timestamps();
        });

        Schema::create('showcases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedInteger('region_id')->default(0);
            $table->unsignedInteger('destination_id')->default(0);
            $table->integer('outfitter_id')->nullable();
            $table->string('outfitter_name')->nullable();
            $table->longText('body');
            $table->text('header_photo')->nullable();
            $table->string('lodge_logo')->default('');
            $table->unsignedInteger('image_id')->default(0);
            $table->boolean('special')->default('')->default(false);
            $table->text('thumbnail')->nullable();
            $table->text('tagline')->nullable();
            $table->text('sidebar_top')->nullable();
            $table->text('sidebar_bottom')->nullable();
            $table->timestamps();
        });

        Schema::create('expeditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->nullable();
            $table->string('type')->nullable();
            $table->integer('num_days')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('outfitter_id')->unsigned()->nullable();
            $table->unsignedInteger('region_id')->default(0);
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('destination_id')->unsigned()->nullable();
            $table->integer('min_anglers')->unsigned()->nullable();
            $table->integer('max_anglers')->unsigned()->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->integer('price_per_angler')->nullable();
            $table->integer('percent_deposit_per_angler')->nullable();
            $table->longText('terms')->nullable(); //store as json object
            $table->longText('misc_fees')->nullable(); //store as json object
            $table->longText('dates_available')->nullable(); //store as json object
            $table->timestamps();
        });

        Schema::create('incoming_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->text('message');
            $table->timestamps();
        });

        Schema::create('deployments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('payload');
            $table->timestamps();
        });

        Schema::create('outfitters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid')->unique();
            $table->integer('owner_id')->index();
            $table->string('name');
            $table->string('slug')->nullable()->unique();
            $table->string('billing_contact')->default('internal');
            $table->text('photo_url')->nullable();
            $table->string('website')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('current_billing_plan')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->string('card_country')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip', 25)->nullable();
            $table->string('billing_country', 2)->nullable();
            $table->string('vat_id', 50)->nullable();
            $table->text('extra_billing_information')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->text('large');
            $table->text('thumbnail');
            $table->text('stamp');
            $table->timestamps();
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('slug')->default('');
            $table->longText('geojson')->default('');
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach($this->tables as $table) {
            Schema::dropIfExists($table);
        }
    }

    protected $tables = [
        'announcements',
        'api_tokens',
        'contact_form_messages',
        'deployments',
        'destinations',
        'expeditions',
        'fish_species',
        'fisheries',
        'fishery_fish_species',
        'fishery_hatches',
        'fly_patterns',
        'flyboxes',
        'habitats',
        'hatch_reports',
        'hatch_types',
        'hatches',
        'images',
        'incoming_contacts',
        'invitations',
        'invoices',
        'maps',
        'newsletter_subscriptions',
        'newsletters',
        'notifications',
        'outfitters',
        'packages',
        'password_resets',
        'performance_indicators',
        'podcasts',
        'posts',
        'prey',
        'privacy',
        'publications',
        'regions',
        'reports',
        'showcases',
        'subscriptions',
        'taggable_taggables',
        'taggable_tags',
        'team_subscriptions',
        'team_users',
        'teams',
        'users',
        'vendors',
        'water_data',
        'weather'
    ];
}
