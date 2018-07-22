<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoupeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!\Schema::hasTable('coupe_types')) {
            \Schema::create('coupe_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->default('');
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
        \Schema::dropIfExists('coupe_types');
    }
}
