<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (\Schema::hasTable('cars')) {
            \Schema::table('cars', function (Blueprint $table) {
                $table->foreign('model_id')
                    ->references('id')->on('models')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('engine_id')
                    ->references('id')->on('engines')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('coupe_type_id')
                    ->references('id')->on('coupe_types')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            });
        }

        if (\Schema::hasTable('models')) {
            \Schema::table('models', function (Blueprint $table) {
                $table->foreign('brand_id')
                    ->references('id')->on('brands')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (\Schema::hasTable('cars')) {
            \Schema::table('cars', function (Blueprint $table) {
                $table->dropForeign(['model_id']);
                $table->dropForeign(['engine_id']);
                $table->dropForeign(['coupe_type_id']);
            });
        }

        if (\Schema::hasTable('models')) {
            \Schema::table('models', function (Blueprint $table) {
                $table->dropForeign(['brand_id']);
            });
        }
    }
}
