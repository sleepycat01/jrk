<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoldingProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('molding_process', function (Blueprint $table) {
            $table->integer('id', true)->unique('molding_process_id_uindex');
            $table->double('feeding_time')->nullable()->comment('เวลากินยาง(sec)');
            $table->integer('injection_force')->nullable()->comment('แรงฉีดเครื่อง(bar)');
            $table->integer('cavity_count')->nullable()->comment('จำนวนก้าน');
            $table->double('screw_temp')->nullable()->comment('ความร้อนกระบอก(celcius)');
            $table->double('injection_temp')->nullable()->comment('อุณหภูมิหัวฉีด(celcius)');
            $table->double('injection_speed')->nullable()->comment('เวลาฉีดยาง(sec)');
            $table->double('shot_repeat_timer')->nullable()->comment('ระยะเวลาตั้งน้ำ(sec)');
            $table->double('compression_force')->nullable()->comment('แรงอัดเครื่อง(bar)');
            $table->double('cure_time')->nullable()->comment('เวลาลง(sec)');
            $table->double('upper_mold_actual_temp')->nullable()->comment('ความร้อนฝาบน(celcius)');
            $table->double('lower_mold_actual_temp')->nullable()->comment('ความร้อนฝาล่าง(celcius)');
            $table->double('core_actual_temp')->nullable()->comment('ความร้อนก้าน(celcius)');
            $table->double('total_shot_size')->nullable()->comment('น้ำหนักยางรวม(กรัม)');
            $table->integer('rubber_weight')->nullable()->comment('น้ำหนักยาง(กรัม)');
            $table->integer('flash_weight')->nullable()->comment('น้ำหนักครีบยาง(กรัม)');
            $table->integer('semi_item_number_fk')->nullable()->index('molding_process_item_semi_item_number_fk');
            $table->integer('mold_fk')->nullable()->index('molding_process_molds_id_fk');
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
        Schema::dropIfExists('molding_process');
    }
}
