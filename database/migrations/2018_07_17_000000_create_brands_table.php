<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!\Schema::hasTable('brands')) {
            \Schema::create('brands', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->default('');
                $table->unsignedTinyInteger('active')->default(0);
                $table->timestamps();
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
        \Schema::dropIfExists('brands');
    }
}
