<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pemeriksaan_ibu_hamils', function (Blueprint $table) {
      $table->id();
      $table->foreignId('ibu_hamil_id')
        ->constrained('ibu_hamils')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->date('tgl_pemeriksaan');
      $table->string('keluhan')->nullable();
      $table->string('tekanan_darah');
      $table->double('berat_badan');
      $table->integer('umur_kehamilan');
      $table->string('tinggi_fundus');
      $table->string('letak_janin');
      $table->string('denyut_jantung_janin');
      $table->string('kaki_bengkak');
      $table->string('hasil_lab')->nullable();
      $table->string('tindakan');
      $table->string('nasihat');
      $table->string('nama_pemeriksa');
      $table->string('tgl_kembali');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('pemeriksaan_ibu_hamils');
  }
};
