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
        Schema::create('ecc_career_readiness_settings', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->enum('period_test_diff_type', ['1', '2', '3', '4'])->comment('"1=hour,2=day,3=week,4=month"');
            $table->tinyInteger('period_test_difference');
            $table->text('statement_scale')->comment('serialize');
            $table->tinyInteger('page_size_statements')->unsigned()->default(5);
            $table->smallInteger('timer_per_page')->default(30);
            $table->text('copyright');
            $table->timestamp('modified_date')->default(now());
            $table->unsignedInteger('modified_id')->nullable();

            $table->unique(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_career_readiness_settings');
    }
};
