<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name_documents',255);
            $table->string('slug_name_documents',255);
            $table->string('url_documents',255);
            $table->integer('downloads')->default(0);
            $table->integer('account_id')->nullable()->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->integer('documentstype_id')->nullable()->unsigned();
            $table->foreign('documentstype_id')->references('id')->on('documents_type');
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
        Schema::dropIfExists('documents');
    }
}
