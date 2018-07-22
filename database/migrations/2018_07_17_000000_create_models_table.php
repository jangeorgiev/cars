<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!\Schema::hasTable('models')) {
            \Schema::create('models', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('brand_id');
                $table->string('name')->default('');
                $table->text('description')->nullable();
                $table->unsignedTinyInteger('active')->default(0);
                $table->timestamps();

                $table->index('brand_id');
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
        \Schema::dropIfExists('models');
    }
}
