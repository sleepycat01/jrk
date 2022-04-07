<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductionLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('production_line', function (Blueprint $table) {
            $table->foreign(['job_work_order_fk'], 'production_line_job_work_order_id_fk')->references(['id'])->on('job_work_order');
            $table->foreign(['user_fk'], 'production_line_users_id_fk')->references(['id'])->on('users');
            $table->foreign(['machine_fk'], 'production_line_machines_id_fk')->references(['id'])->on('machines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('production_line', function (Blueprint $table) {
            $table->dropForeign('production_line_job_work_order_id_fk');
            $table->dropForeign('production_line_users_id_fk');
            $table->dropForeign('production_line_machines_id_fk');
        });
    }
}
