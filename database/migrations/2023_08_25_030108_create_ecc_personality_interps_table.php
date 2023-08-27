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
        Schema::create('ecc_personality_interps', function (Blueprint $table) {
            $table->tinyIncrements('id_interp');
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('cat_id')->unsigned()->notNull();
            $table->char('alias_code', 2)->notNull();
            $table->tinyInteger('range_start')->unsigned()->notNull();
            $table->text('interpretasi');
            $table->text('interpretasi_alt');
            $table->text('complete_interpretation')->nullable();
            $table->tinyInteger('range_end')->unsigned()->notNull();
            $table->string('description', 200)->nullable();
            $table->text('tendency_work');
            $table->text('tedency_communication');
            $table->text('powers')->comment('Point kekuatan/ kelemahan');
            $table->text('less')->comment('Kekurangan');
            $table->text('psychological_dynamics')->comment('Dinamika psikologis');
            $table->text('dev_advice')->comment('Saran pengembangan');
            $table->unsignedInteger('modified_id')->nullable();
            $table->timestamp('modified_date')->default(now())->onUpdate(now());

            // fk
            $table->foreign('cat_id')->references('id_cat')->on('ecc_personality_interp_categories')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_personality_interps');
    }
};
