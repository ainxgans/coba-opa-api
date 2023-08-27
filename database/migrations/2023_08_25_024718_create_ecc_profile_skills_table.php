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
        Schema::create('ecc_profile_skills', function (Blueprint $table) {
            $table->increments('id_skill');
            $table->tinyInteger('publish')->default(1)->comment('publish,unpublish');
            $table->unsignedInteger('user_id')->nullable();
            $table->enum('skill_type', ['hard', 'soft'])->notNull();
            $table->unsignedInteger('skill_id')->notNull();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_profile_skills');
    }
};
