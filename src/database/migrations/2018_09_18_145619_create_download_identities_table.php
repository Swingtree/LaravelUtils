<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download_identities', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name',64);
            $table->string('type', 16);
            $table->integer('exp', FALSE, TRUE)->comment = 'Expires at';
            $table->boolean('one_time');
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('download_identities');
    }
}
