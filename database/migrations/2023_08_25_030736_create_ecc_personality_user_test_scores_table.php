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
        Schema::create('ecc_personality_user_test_scores', function (Blueprint $table) {
            $table->increments('id_score');
            $table->unsignedInteger('test_id')->notNull();
            $table->unsignedTinyInteger('cat_id')->notNull();
            $table->unsignedTinyInteger('score')->notNull();

            // fk
            $table->foreign('test_id')->references('id_test')->on('ecc_personality_user_tests')->onDelete('cascade');
            $table->foreign('cat_id')->references('id_cat')->on('ecc_personality_interp_categories')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_personality_user_test_scores');
    }
};
