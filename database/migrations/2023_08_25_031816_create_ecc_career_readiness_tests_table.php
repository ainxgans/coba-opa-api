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
        Schema::create('ecc_career_readiness_tests', function (Blueprint $table) {
            $table->increments('id_test');
            $table->tinyInteger('publish')->default(1);
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamp('start_date')->default(now());
            $table->datetime('finish_date')->default(NULL);
            $table->date('next_test_date')->default(NULL);
            $table->tinyInteger('interp_general_id')->unsigned()->notNull();
            $table->smallInteger('interp_general_score')->unsigned()->notNull()->default(0);
            $table->tinyInteger('evaluation_grade')->default(0);
            $table->datetime('evaluation_date')->default(NULL);
            $table->timestamp('modified_date')->default(now());
            $table->unsignedInteger('modified_id')->nullable();

            // fk
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('interp_general_id')->references('id_interp_general')->on('ecc_career_readiness_interpretation_generals')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_career_readiness_tests');
    }
};
