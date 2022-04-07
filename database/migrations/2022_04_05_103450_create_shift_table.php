<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift', function (Blueprint $table) {
            $table->integer('id', true)->unique('shift_id_uindex');
            $table->enum('shift_type', ['A', 'B'])->nullable()->default('A');
            $table->enum('workhour_type', ['8', '12'])->nullable()->default('8');
            $table->integer('target')->nullable()->default(100);
            $table->integer('ng')->nullable();
            $table->integer('diff')->nullable();
            $table->string('shift_detail', 50)->nullable()->default('08:00-10:00');
            $table->integer('user_fk')->nullable()->index('shift_users_id_fk');
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
        Schema::dropIfExists('shift');
    }
}
