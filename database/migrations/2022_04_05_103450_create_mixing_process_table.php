<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMixingProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mixing_process', function (Blueprint $table) {
            $table->integer('id', true)->unique('mixing_process_id_uindex');
            $table->string('body_formula', 100)->nullable();
            $table->string('cap_formula', 100)->nullable();
            $table->double('body_sp_g')->nullable();
            $table->double('cap_sp_g')->nullable();
            $table->double('body_hardness')->nullable()->comment('ความแข็งของยาง(shore A)');
            $table->double('cap_hardness')->nullable()->comment('ความแข็งของหัวแค๊ป(shore A)');
            $table->string('dye_cut_type', 50)->nullable()->comment('รุ่นไดย์คัท');
            $table->double('cap_thickness')->nullable()->comment('ความหนาของหัวแค๊ป(mm)');
            $table->double('cap_weight')->nullable()->comment('น้ำหนักหัวแค๊ป(gram)');
            $table->integer('semi_item_number_fk')->nullable()->index('mixing_process_item_semi_item_number_fk');
            $table->integer('rubber_compound_fk')->nullable()->index('mixing_process_rubber_compound_spec_id_fk');
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
        Schema::dropIfExists('mixing_process');
    }
}
