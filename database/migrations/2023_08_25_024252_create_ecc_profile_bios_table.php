<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ecc_profile_bios', function (Blueprint $table) {
            $table->increments('id_bio');
            $table->tinyInteger('publish')->default(1)->comment('publish,unpublish');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('photo')->nullable();
            $table->enum('gender', ['male', 'female'])->notNull();
            $table->unsignedInteger('birth_place')->notNull();
            $table->date('birth_date')->default(NULL);
            $table->unsignedSmallInteger('bio_country_id')->nullable();
            $table->unsignedSmallInteger('bio_province_id')->nullable();
            $table->unsignedInteger('bio_city_id')->nullable();
            $table->text('short_biography')->nullable();
            $table->text('positive')->nullable();
            $table->text('negative')->nullable();
            $table->string('job_title')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_profile_bios');
    }
};
