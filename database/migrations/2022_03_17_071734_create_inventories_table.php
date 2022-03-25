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
        Schema::create(' ', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('ชื่อสินค้า');
            $table->string('code')->comment('รหัสสินค้า');
            $table->string('stock')->comment('สินค้าคงเหลือ');
            $table->enum('status',['active','inactive'])->default('active')->comment('สถานะสินค้า');
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
        Schema::dropIfExists('inventories');
    }
};
