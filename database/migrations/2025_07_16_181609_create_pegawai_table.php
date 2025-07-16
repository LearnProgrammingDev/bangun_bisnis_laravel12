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


        Schema::create('kantor', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('description')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('nohp');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->date('hire_date');
            $table->foreignId('kantor_id')->constrained('kantor');
            $table->foreignId('role_id')->constrained('roles');
            $table->string('status');
            $table->string('salary', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('assigned_to')->constrained('pegawai');
            $table->date('tanggal_selesai');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->decimal('gaji', 10, 2);
            $table->decimal('bonus', 10, 2)->nullable();
            $table->decimal('potongan', 10, 2)->nullable();
            $table->decimal('gaji_alter_potongan', 10, 2)->nullable();
            $table->date('tanggal_gajian');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->date('masuk_kantor');
            $table->date('keluar_kantor');
            $table->date('tanggal_absen');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->string('cuti_apa');
            $table->date('mulai_cuti');
            $table->date('akhir_cuti');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
        Schema::dropIfExists('kantor');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('tugas');
        Schema::dropIfExists('gaji');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('cuti');
    }
};
