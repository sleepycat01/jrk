<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderSpecificationSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_specification_sheet', function (Blueprint $table) {
            $table->foreign(['user_fk'], 'order_specification_sheet_users_id_fk')->references(['id'])->on('users');
            $table->foreign(['semi_item_number_fk'], 'semi_item_number_fk')->references(['semi_item_number'])->on('item')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_specification_sheet', function (Blueprint $table) {
            $table->dropForeign('order_specification_sheet_users_id_fk');
            $table->dropForeign('semi_item_number_fk');
        });
    }
}
