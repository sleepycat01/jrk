<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ngs', function (Blueprint $table) {
            $table->foreign(['shift_fk'], 'ngs_shift_id_fk')->references(['id'])->on('shift');
            $table->foreign(['machine_fk'], 'ngs_machines_id_fk')->references(['id'])->on('machines');
            $table->foreign(['production_line_fk'], 'ngs_production_line_id_fk')->references(['id'])->on('production_line');
            $table->foreign(['user_fk'], 'ngs_users_id_fk')->references(['id'])->on('users');
            $table->foreign(['ngs_code_fk'], 'ngs_ngs_code_code_fk')->references(['code'])->on('ngs_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ngs', function (Blueprint $table) {
            $table->dropForeign('ngs_shift_id_fk');
            $table->dropForeign('ngs_machines_id_fk');
            $table->dropForeign('ngs_production_line_id_fk');
            $table->dropForeign('ngs_users_id_fk');
            $table->dropForeign('ngs_ngs_code_code_fk');
        });
    }
}
