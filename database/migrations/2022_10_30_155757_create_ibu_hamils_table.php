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
    Schema::create('ibu_hamils', function (Blueprint $table) {
      $table->id();
      $table->string('nama', 255);
      $table->foreignId('keluarga_id')
        ->constrained('keluargas')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->string('anak_ke', 155);
      $table->date('tgl_lahir');
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
    Schema::dropIfExists('ibu_hamils');
  }
};
