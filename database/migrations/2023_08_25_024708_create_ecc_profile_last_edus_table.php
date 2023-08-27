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
        Schema::create('ecc_profile_last_edus', function (Blueprint $table) {
            $table->increments('id_edu');
            $table->tinyInteger('publish')->default(1)->comment('publish,unpublish');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('university_id')->notNull();
            $table->unsignedSmallInteger('education_type_id')->nullable();
            $table->unsignedInteger('major_id')->nullable();
            $table->string('submajor', 64)->notNull();
            $table->date('started_date')->default(NULL);
            $table->date('finished_date')->default(NULL);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecc_profile_last_edus');
    }
};
