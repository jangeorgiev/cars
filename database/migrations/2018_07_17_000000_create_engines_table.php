<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!\Schema::hasTable('engines')) {
            \Schema::create('engines', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->default('');
                $table->text('description')->nullable();
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
        \Schema::dropIfExists('engines');
    }
}
