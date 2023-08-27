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
        Schema::create('ecc_career_readiness_statements', function (Blueprint $table) {
            $table->smallIncrements('id_statement');
            $table->tinyInteger('publish')->default(1);
            $table->enum('category', ['favorable', 'unfavorable'])->default('favorable');
            $table->tinyInteger('aspect_id')->unsigned()->notNull();
            $table->string('statement_name', 200)->notNull();
            $table->timestamp('creation_date')->default(now());
            $table->unsignedInteger('creation_id')->nullable();
            $table->timestamp('modified_date')->default(now());
            $table->unsignedInteger('modified_id')->nullable();

            // fk
            $table->foreign('aspect_id')->references('id_aspect')->on('ecc_career_readiness_aspects')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('creation_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modified_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_career_readiness_statements');
    }
};
