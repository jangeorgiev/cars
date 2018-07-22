<?php

use Illuminate\Database\Migrations\Migration;

class InsertCoupeTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (\Schema::hasTable('coupe_types')) {
            \DB::table('coupe_types')->insert([
                ['name' => 'pickup'],
                ['name' => 'suv'],
                ['name' => 'coupe'],
                ['name' => 'convertible'],
                ['name' => 'sedan'],
                ['name' => 'minicar'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (\Schema::hasTable('coupe_types')) {
            \DB::table('coupe_types')->truncate();
        }
    }
}
