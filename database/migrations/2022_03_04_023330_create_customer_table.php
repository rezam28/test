<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('customer');
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->double('lat', 10,8);
            $table->double('long',11,8);
            // $table->unsignedBigInteger('cusType_id');
            $table->date('ttl');
            $table->text('keterangan');
            $table->boolean('status');
            $table->timestamps();
            // $table->foreign('cusType_id')->references('id')->on('customer_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('customer');
    }
}
