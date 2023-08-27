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
        Schema::create('ecc_career_readiness_aspects', function (Blueprint $table) {
            $table->tinyIncrements('id_aspect');
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('parent_id')->unsigned()->nullable();
            $table->string('aspect_name', 70)->notNull();
            $table->text('aspect_desc')->notNull();
            $table->timestamp('creation_date')->default(now());
            $table->unsignedInteger('creation_id')->nullable();
            $table->timestamp('modified_date')->default(now());
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
        Schema::dropIfExists('ecc_career_readiness_aspects');
    }
};
