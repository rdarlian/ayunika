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
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('groom_name')->nullable();
            $table->string('groom_nickname')->nullable();
            $table->string('groom_child_order')->nullable();
            $table->string('groom_father')->nullable();
            $table->string('groom_mother')->nullable();
            $table->string('groom_address')->nullable();
            $table->string('bride_name')->nullable();
            $table->string('bride_nickname')->nullable();
            $table->string('bride_child_order')->nullable();
            $table->string('bride_father')->nullable();
            $table->string('bride_mother')->nullable();
            $table->string('bride_address')->nullable();

            $table->string('alamatAkad')->nullable();
            $table->string('alamatAkadLengkap')->nullable();
            $table->date('akad_date')->nullable();
            $table->time('akad_time')->nullable();

            $table->string('alamatResepsi')->nullable();
            $table->string('alamatResepsiLengkap')->nullable();
            $table->date('resepsi_date')->nullable();
            $table->time('resepsi_time')->nullable();

            $table->boolean('timetitle')->nullable();
            $table->boolean('isSameAddress')->nullable();

            $table->string('akad_lat')->nullable();
            $table->string('akad_lng')->nullable();
            $table->string('resepsi_lat')->nullable();
            $table->string('resepsi_lng')->nullable();
            $table->string('koordinatAkad')->nullable();

            $table->string('link')->nullable();

            $table->longText('quote')->nullable();
            $table->string('quote_source')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('undangans');
    }
};
