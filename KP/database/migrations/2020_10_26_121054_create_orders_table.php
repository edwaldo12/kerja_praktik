<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_customer')->nullable()->unsigned();
            $table->timestamps();
            $table->bigInteger('nomor_telepon_pemesan');
            $table->string('alamat');
            $table->softDeletes();
            $table->string('upload_file')->nullable();
            $table->integer('total_harga_dibayar');
            $table->bigInteger('fk_id')->nullable()->unsigned();
            $table->enum(
                'status',
                ['0', '1', '2', '3', '4', '5', '6']
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
