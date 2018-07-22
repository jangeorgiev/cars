<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!\Schema::hasTable('cars')) {
            \Schema::create('cars', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('model_id');
                $table->unsignedInteger('engine_id');
                $table->unsignedInteger('coupe_type_id');
                $table->string('name')->default('');
                $table->string('color')->default('');
                $table->string('image_url')->default('');
                $table->unsignedDecimal('price')->default(0.00);
                $table->unsignedTinyInteger('active')->default(0);
                $table->timestamps();

                $table->index('model_id');
                $table->index('engine_id');
                $table->index('coupe_type_id');
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
        \Schema::dropIfExists('cars');
    }
}
