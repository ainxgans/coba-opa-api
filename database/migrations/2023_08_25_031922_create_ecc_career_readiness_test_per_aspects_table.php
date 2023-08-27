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
        Schema::create('ecc_career_readiness_test_per_aspects', function (Blueprint $table) {
            $table->increments('id_test');
            $table->tinyInteger('publish')->default(1);
            $table->unsignedInteger('test_id')->notNull();
            $table->unsignedTinyInteger('interp_aspect_id')->notNull();
            $table->smallInteger('interp_aspect_score')->unsigned()->notNull()->default(0);
            $table->timestamp('modified_date')->default(now());
            $table->unsignedInteger('modified_id')->nullable();

            // fk
            $table->foreign('test_id')->references('id_test')->on('ecc_career_readiness_tests')->onDeleteCascade()->onUpdateCascade;
            $table->foreign('interp_aspect_id')->references('id_interp_aspect')->on('ecc_career_readiness_interpretation_aspects')->onDeleteNoAction()->onUpdateCascade;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_career_readiness_test_per_aspects');
    }
};
