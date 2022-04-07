<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title')->comment('ชื่อสินค้าเสีย');
            $table->enum('ngs_status', ['active', 'inactive'])->default('active')->comment('สถานะสินค้าเสีย');
            $table->timestamps();
            $table->integer('shift_fk')->nullable()->index('ngs_shift_id_fk');
            $table->integer('user_fk')->nullable()->index('ngs_users_id_fk');
            $table->integer('machine_fk')->nullable()->index('ngs_machines_id_fk');
            $table->integer('production_line_fk')->nullable()->index('ngs_production_line_id_fk');
            $table->integer('ngs_code_fk')->nullable()->index('ngs_ngs_code_code_fk');
            $table->integer('ngs_count')->nullable();
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
}
