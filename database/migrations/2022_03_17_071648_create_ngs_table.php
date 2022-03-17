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
        Schema::create('ngs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('ชื่อสินค้าเสีย');
            $table->string('code')->comment('รหัสสินค้าเสีย');
            $table->enum('status',['active','inactive'])->default('active')->comment('สถานะสินค้าเสีย');
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
        Schema::dropIfExists('ngs');
    }
};
