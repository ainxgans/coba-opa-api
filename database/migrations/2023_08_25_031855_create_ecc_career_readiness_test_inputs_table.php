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
        Schema::create('ecc_career_readiness_test_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('test_id')->notNull();
            $table->unsignedSmallInteger('statement_id')->notNull();
            $table->unsignedTinyInteger('choice_id')->notNull();
            $table->timestamp('creation_date')->default(now());

            // fk
            $table->foreign('test_id')->references('id_test')->on('ecc_career_readiness_tests')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('statement_id')->references('id_statement')->on('ecc_career_readiness_statements')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('choice_id')->references('id_choise')->on('ecc_career_readiness_statements_choises')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_career_readiness_test_inputs');
    }
};
