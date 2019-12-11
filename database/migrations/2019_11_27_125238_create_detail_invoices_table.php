<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('product_id');
            $table->integer('harga');
            $table->integer('banyak_brg');
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
        Schema::dropIfExists('detail_invoices');
    }
}
