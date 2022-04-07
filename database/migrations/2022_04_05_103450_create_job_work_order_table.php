<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobWorkOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_work_order', function (Blueprint $table) {
            $table->integer('id', true)->unique('work_order_id_uindex');
            $table->string('work_order_number', 50)->comment('example No.2022-0208');
            $table->date('order_date')->nullable();
            $table->dateTime('order_time')->nullable();
            $table->integer('po_number')->nullable();
            $table->string('order_description', 100)->nullable();
            $table->string('customer_name', 50)->nullable();
            $table->integer('quantity')->nullable()->comment('pcs');
            $table->string('delivery_date', 50)->nullable();
            $table->string('geometric', 100)->nullable();
            $table->string('size', 50)->nullable();
            $table->string('material_type', 50)->nullable();
            $table->boolean('is_stock')->nullable();
            $table->boolean('is_purchase')->nullable();
            $table->integer('machine_fk')->nullable()->index('job_work_order_machines_id_fk');
            $table->integer('order_fk')->nullable()->index('job_work_order_order_specification_sheet_order_id_fk');
            $table->integer('semi_item_number_fk')->nullable()->index('job_work_order_item_semi_item_number_fk');
            $table->integer('supplier_fk')->nullable()->index('job_work_order_supplier_id_fk');
            $table->integer('user_fk')->nullable()->index('job_work_order_users_id_fk');
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
        Schema::dropIfExists('job_work_order');
    }
}
