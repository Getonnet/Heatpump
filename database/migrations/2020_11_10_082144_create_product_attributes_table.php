<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('NO ACTION');
            $table->integer('attributes_id')->unsigned();
            $table->foreign('attributes_id')->references('id')->on('attributes')->onDelete('cascade')->onUpdate('NO ACTION');
            $table->string('attr_value')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['products_id', 'attributes_id']);
        });
    }


    //ALTER TABLE `attribute_values` ADD `attr_value` VARCHAR(191) NULL AFTER `product_attributes_id`;
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
