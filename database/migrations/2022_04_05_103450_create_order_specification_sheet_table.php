<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSpecificationSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_specification_sheet', function (Blueprint $table) {
            $table->integer('order_id', true);
            $table->string('customer_name', 50)->nullable();
            $table->string('remark', 50)->nullable();
            $table->string('logo_name', 50)->nullable();
            $table->string('cap_name', 50)->nullable();
            $table->string('cap_color', 50)->nullable();
            $table->string('body_color', 50)->nullable();
            $table->string('enovia_code', 50)->nullable();
            $table->string('front_pic', 100)->nullable();
            $table->string('back_pic', 100)->nullable();
            $table->integer('ref_number')->nullable();
            $table->string('ref_from', 100)->nullable();
            $table->integer('rev_version')->nullable();
            $table->integer('effective_date')->nullable();
            $table->string('detail', 500)->nullable();
            $table->string('verified_by', 50)->nullable();
            $table->string('prepared_by', 50)->nullable();
            $table->string('collected_by', 50)->nullable();
            $table->string('1st_approved_by', 50)->nullable();
            $table->string('2nd_approved_by', 50)->nullable();
            $table->integer('semi_item_number_fk')->nullable()->unique('order_semi_item_number_fk_uindex');
            $table->integer('user_fk')->nullable()->index('order_specification_sheet_users_id_fk');
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
        Schema::dropIfExists('order_specification_sheet');
    }
}
