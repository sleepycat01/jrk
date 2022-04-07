<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 100)->comment('ชื่อเครื่องจักร');
            $table->string('machine_code', 50)->comment('รหัสเครื่องจักร');
            $table->enum('machine_status', ['active', 'inactive'])->default('active')->comment('สถานะเครื่องจักร');
            $table->string('duty_by', 50)->nullable();
            $table->double('working_duration')->nullable();
            $table->float('failure_duration', 10, 0)->nullable();
            $table->dateTime('machine_start_time')->nullable();
            $table->dateTime('machine_stop_time')->nullable();
            $table->dateTime('machine_failure_end_time')->nullable();
            $table->string('machine_failure_remark')->nullable();
            $table->dateTime('machine_failure_start_time')->nullable();
            $table->timestamps();
            $table->integer('user_fk')->nullable()->index('machines_users_id_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
