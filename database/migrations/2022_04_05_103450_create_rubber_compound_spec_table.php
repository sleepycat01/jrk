<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubberCompoundSpecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubber_compound_spec', function (Blueprint $table) {
            $table->integer('id', true)->unique('rubber_compound_spec_id_uindex');
            $table->string('compound_name', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->double('spg')->nullable();
            $table->double('mh')->nullable();
            $table->double('ml')->nullable();
            $table->double('ts2')->nullable();
            $table->double('tc45')->nullable();
            $table->string('batch_no', 100)->nullable();
            $table->double('tq@5')->nullable();
            $table->double('tc90')->nullable();
            $table->integer('hardness')->nullable();
            $table->date('expired_date')->nullable();
            $table->string('remark', 100)->nullable();
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
        Schema::dropIfExists('rubber_compound_spec');
    }
}
