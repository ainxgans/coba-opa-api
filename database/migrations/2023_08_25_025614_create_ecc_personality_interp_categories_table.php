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
        Schema::create('ecc_personality_interp_categories', function (Blueprint $table) {
            $table->tinyIncrements('id_cat');
            $table->string('aspect', 45)->notNull();
            $table->string('label', 60)->notNull();
            $table->string('description', 255)->nullable();
            $table->text('left')->notNull();
            $table->text('right')->notNull();
            $table->unsignedInteger('modified_id')->nullable();
            $table->timestamp('modified_date')->default(now())->onUpdate(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_personality_interp_categories');
    }
};
