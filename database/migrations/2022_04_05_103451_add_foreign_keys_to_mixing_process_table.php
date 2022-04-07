<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMixingProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mixing_process', function (Blueprint $table) {
            $table->foreign(['semi_item_number_fk'], 'mixing_process_item_semi_item_number_fk')->references(['semi_item_number'])->on('item');
            $table->foreign(['rubber_compound_fk'], 'mixing_process_rubber_compound_spec_id_fk')->references(['id'])->on('rubber_compound_spec');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mixing_process', function (Blueprint $table) {
            $table->dropForeign('mixing_process_item_semi_item_number_fk');
            $table->dropForeign('mixing_process_rubber_compound_spec_id_fk');
        });
    }
}
