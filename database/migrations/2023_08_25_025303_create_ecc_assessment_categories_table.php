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
        Schema::create('ecc_assessment_categories', function (Blueprint $table) {
            $table->tinyIncrements('id_cat');
            $table->tinyInteger('publish')->default(1);
            $table->string('category_name', 100)->notNull();
            $table->text('description')->notNull();
            $table->string('url_test', 200)->notNull();
            $table->string('url_result', 200)->notNull();
            $table->unsignedInteger('creation_id')->nullable();
            $table->timestamp('creation_date')->default(now());
            $table->unsignedInteger('modified_id')->nullable();
            $table->timestamp('modified_date')->default(now())->onUpdate(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_assessment_categories');
    }
};
