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
        Schema::create('ecc_personality_interp_grades', function (Blueprint $table) {
            $table->tinyIncrements('id_grade');
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('interp_id')->unsigned()->notNull();
            $table->tinyInteger('grade_value')->unsigned()->notNull()->comment('Nilai rentang antar 1-7, untuk baik, cukup, kurang');
            $table->tinyInteger('range_start')->unsigned()->notNull()->comment('Nilai minimal rentang');
            $table->tinyInteger('range_end')->unsigned()->notNull()->comment('Nilai maximal rentang');
            $table->unsignedInteger('modified_id')->nullable();
            $table->timestamp('modified_date')->default(now())->onUpdate(now());

            // fk
            $table->foreign('interp_id')->references('id_interp')->on('ecc_personality_interps')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_personality_interp_grades');
    }
};
