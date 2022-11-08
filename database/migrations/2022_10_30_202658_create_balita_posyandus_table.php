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
    Schema::create('balita_posyandus', function (Blueprint $table) {
      $table->id();
      $table->foreignId('balita_id')
        ->constrained('balitas')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->date('tgl_posyandu');
      $table->double('berat_badan');
      $table->double('tinggi_badan');
      $table->double('lingkar_kepala');
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
    Schema::dropIfExists('balita_posyandus');
  }
};
