<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('Fk from table: users');
            $table->string('resturant_name');
            $table->string('resturant_name_slug')->unique();
            $table->string('resturant_directory_name')->unique();
            $table->string('resturant_full_url')->unique()->nullable();
            $table->string('resturant_short_url_slug')->unique()->nullable();
            $table->string('resturant_full_short_url')->unique()->nullable();
            $table->string('resturant_location');
            $table->string('resturant_comment')->nullable();
            $table->string('client_phone_one');
            $table->string('client_phone_two')->nullable();
            $table->string('resturant_logo')->default('default_logo.png')->nullable();
            $table->string('resturant_barcode')->default('default_barcode.png')->nullable();
            $table->tinyInteger('url_status')->default(1)->comment('1 = Active, 0 = Inactive');
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
        Schema::dropIfExists('clients');
    }
};
