<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToJobWorkOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_work_order', function (Blueprint $table) {
            $table->foreign(['supplier_fk'], 'job_work_order_supplier_id_fk')->references(['id'])->on('supplier');
            $table->foreign(['semi_item_number_fk'], 'job_work_order_item_semi_item_number_fk')->references(['semi_item_number'])->on('item');
            $table->foreign(['order_fk'], 'job_work_order_order_specification_sheet_order_id_fk')->references(['order_id'])->on('order_specification_sheet');
            $table->foreign(['user_fk'], 'job_work_order_users_id_fk')->references(['id'])->on('users');
            $table->foreign(['machine_fk'], 'job_work_order_machines_id_fk')->references(['id'])->on('machines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_work_order', function (Blueprint $table) {
            $table->dropForeign('job_work_order_supplier_id_fk');
            $table->dropForeign('job_work_order_item_semi_item_number_fk');
            $table->dropForeign('job_work_order_order_specification_sheet_order_id_fk');
            $table->dropForeign('job_work_order_users_id_fk');
            $table->dropForeign('job_work_order_machines_id_fk');
        });
    }
}
