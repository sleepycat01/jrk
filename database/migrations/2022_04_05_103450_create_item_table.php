<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->integer('semi_item_number', true)->unique('item_semi_item_number_uindex');
            $table->string('model_name')->comment('ชื่อสินค้า');
            $table->string('stock')->comment('สินค้าคงเหลือ');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('สถานะสินค้า');
            $table->timestamps();
            $table->integer('rubber_compound_fk')->nullable()->index('item_rubber_compound_spec_id_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
