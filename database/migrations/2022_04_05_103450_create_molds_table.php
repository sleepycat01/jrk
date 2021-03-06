<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('molds', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title')->comment('ชื่อแม่พิมพ์');
            $table->string('code')->comment('รหัสแม่พิมพ์');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('สถานะแม่พิพม์');
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
        Schema::dropIfExists('molds');
    }
}
