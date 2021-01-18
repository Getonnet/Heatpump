<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('product_types',['AC', 'Heater', 'Accessories'])->default('AC');
            $table->float('capacity')->default(0)->comment('Using for AC/Heater');
            $table->float('noise_level')->default(0);
            $table->double('price')->default(0);
            $table->string('photo')->nullable();
            $table->json('other_needs')->nullable()->comment('Suggested Product/Accessories');
            $table->text('descriptions')->nullable();
            $table->string('details_link')->nullable();
            $table->integer('product_categories_id')->unsigned();
            $table->foreign('product_categories_id')->references('id')->on('product_categories')->onDelete('cascade')->onUpdate('NO ACTION');
            $table->integer('product_brands_id')->unsigned()->nullable();
            $table->foreign('product_brands_id')->references('id')->on('product_brands')->onDelete('SET NULL')->onUpdate('NO ACTION');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
