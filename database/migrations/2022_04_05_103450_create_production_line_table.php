<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_line', function (Blueprint $table) {
            $table->integer('id', true)->unique('production_line_id_uindex');
            $table->timestamp('created_at')->nullable();
            $table->integer('production_time_summary')->nullable();
            $table->string('line_manager', 50)->nullable();
            $table->string('controller_user', 50)->nullable();
            $table->string('qc_user', 50)->nullable();
            $table->integer('transcation_count')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('machine_fk')->nullable()->index('production_line_machines_id_fk');
            $table->integer('user_fk')->nullable()->index('production_line_users_id_fk');
            $table->integer('job_work_order_fk')->nullable()->index('production_line_job_work_order_id_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_line');
    }
}
