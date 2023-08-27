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
        Schema::create('ecc_personality_configs', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('periode_test_monthly')->notNull();
            $table->mediumInteger('maxtime_per_page')->notNull();
            $table->unsignedInteger('modified_id')->nullable();
            $table->timestamp('modified_date')->default(now())->onUpdate(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_personality_configs');
    }
};
