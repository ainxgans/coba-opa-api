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
        Schema::create('ecc_personality_user_tests', function (Blueprint $table) {
            $table->increments('id_test');
            $table->tinyInteger('publish')->default(1);
            $table->unsignedInteger('user_id')->notNull();
            $table->tinyInteger('is_last_test')->notNull();
            $table->string('self_analyze_result', 20)->notNull();
            $table->unsignedTinyInteger('evaluation_grade')->unsigned()->notNull()->default(0);
            $table->dateTime('test_date')->notNull();

            // fk
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_personality_user_tests');
    }
};
