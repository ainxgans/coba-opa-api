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
        Schema::create('ecc_career_readiness_interpretation_generals', function (Blueprint $table) {
            $table->tinyIncrements('id_interp_general');
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('general_status')->unsigned()->notNull();
            $table->tinyInteger('general_interpretation')->unsigned()->notNull();
            $table->smallInteger('range_score_start')->unsigned()->notNull()->default(0);
            $table->smallInteger('range_score_end')->unsigned()->notNull()->default(0);
            $table->timestamp('creation_date')->default(now());
            $table->unsignedInteger('creation_id')->nullable();
            $table->timestamp('modified_date')->default(NULL)->onUpdate(now());
            $table->unsignedInteger('modified_id')->nullable();

            // fk
            $table->foreign('creation_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modified_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_career_readiness_interpretation_generals');
    }
};
