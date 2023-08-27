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
        Schema::create('ecc_personality_statemen_choises', function (Blueprint $table) {
            $table->tinyIncrements('id_choise');
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('page_id')->unsigned()->notNull();
            $table->tinyInteger('cat_id')->unsigned()->notNull();
            $table->string('statement', 70)->notNull();
            $table->unsignedInteger('creation_id')->nullable();
            $table->timestamp('creation_date')->default(now());
            $table->unsignedInteger('modified_id')->nullable();
            $table->timestamp('modified_date')->default(now())->onUpdate(now());

            // fk
            $table->foreign('page_id')->references('id_page')->on('ecc_personality_statemen_pages')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('cat_id')->references('id_cat')->on('ecc_personality_interp_categories')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_personality_statemen_choises');
    }
};
