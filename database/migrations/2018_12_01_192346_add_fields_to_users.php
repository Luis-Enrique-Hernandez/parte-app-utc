<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //en este momento modificaremos campos de una tabla ya registrada la cual es users
        Schema::table('users', function($table)
        {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('username');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn([
                'phone', 'address'
            ]);

        });
    }
}
