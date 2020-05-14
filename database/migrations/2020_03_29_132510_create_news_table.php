<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('description',255);
            $table->string('slug_description',255);
            $table->string('urlimage',255);
            $table->dateTime('dateCreateNew')->nullable();
            $table->integer('views')->default(0);
            $table->integer('account_id')->nullable()->unsigned();
            $table->integer('newstype_id')->nullable()->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts'); 
            $table->foreign('newstype_id')->references('id')->on('newstypes');
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
