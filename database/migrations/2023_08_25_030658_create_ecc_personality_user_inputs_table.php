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
        Schema::create('ecc_personality_user_inputs', function (Blueprint $table) {
            $table->increments('id_input');
            $table->unsignedInteger('test_id')->notNull();
            $table->unsignedTinyInteger('choise_id')->notNull();
            $table->timestamp('creation_date')->default(now());

            // fk
            $table->foreign('test_id')->references('id_test')->on('ecc_personality_user_tests')->onDelete('cascade');
            $table->foreign('choise_id')->references('id_choise')->on('ecc_personality_statemen_choises')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_personality_user_inputs');
    }
};
