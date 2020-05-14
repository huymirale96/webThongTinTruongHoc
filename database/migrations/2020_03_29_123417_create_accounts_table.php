<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->Increments('id');
           
            $table->string('fullname',50);
            $table->string('email',30)->unique();;
            $table->string('phone',15);
            $table->string('username',20)->unique();;
            $table->string('password',100);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        //php artisan make:migration create_accounts_table
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
