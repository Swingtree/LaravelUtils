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
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('name',32);
            $table->string('type', 16);
            $table->timestamp('exp')->comment = 'Expires at';
            $table->boolean('one_time');
            $table->timestamps();
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
