<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('supplier_id');
            $table->dropColumn('name');

            $table->integer('product_supplier_id');
            $table->decimal('weight', 7, 2);
            $table->integer('box');
        });
    }
}
