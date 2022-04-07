<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMoldingProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('molding_process', function (Blueprint $table) {
            $table->foreign(['semi_item_number_fk'], 'molding_process_item_semi_item_number_fk')->references(['semi_item_number'])->on('item');
            $table->foreign(['mold_fk'], 'molding_process_molds_id_fk')->references(['id'])->on('molds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('molding_process', function (Blueprint $table) {
            $table->dropForeign('molding_process_item_semi_item_number_fk');
            $table->dropForeign('molding_process_molds_id_fk');
        });
    }
}
