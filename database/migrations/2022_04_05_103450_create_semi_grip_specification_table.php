<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemiGripSpecificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semi_grip_specification', function (Blueprint $table) {
            $table->integer('id', true);
            $table->double('semi_grip_weight')->nullable()->comment('น้ำหนักกริป(gram)');
            $table->double('cap_thickness')->nullable()->comment('ความหนาแค๊ป(mm)');
            $table->double('semi_grip_length')->nullable()->comment('ความยาวกริ๊ป(mm)');
            $table->integer('semi_item_number_fk')->nullable()->index('semi_grip_specification_item_semi_item_number');
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
        Schema::dropIfExists('semi_grip_specification');
    }
}
