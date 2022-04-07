<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSemiGripSpecificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('semi_grip_specification', function (Blueprint $table) {
            $table->foreign(['semi_item_number_fk'], 'semi_grip_specification_item_semi_item_number')->references(['semi_item_number'])->on('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('semi_grip_specification', function (Blueprint $table) {
            $table->dropForeign('semi_grip_specification_item_semi_item_number');
        });
    }
}
