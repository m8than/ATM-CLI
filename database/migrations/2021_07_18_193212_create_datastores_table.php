<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDatastoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datastores', function (Blueprint $table) {
            $table->string('key')->unique();
            $table->string('value');
            $table->primary('key');
            $table->timestamps();
        });

        DB::table('datastores')->insert(
            [
                [
                    'key' => 'funds_available',
                    'value' => '8000'
                ],
                // some useless data for the specific task (just examples of what could be stored)
                [
                    'key' => 'version',
                    'value' => '1'
                ],                [
                    'key' => 'transaction_count',
                    'value' => '0'
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datastores');
    }
}
