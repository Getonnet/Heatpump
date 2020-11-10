<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('zip_code',20)->nullable();
            $table->string('address')->nullable();
            $table->string('contact',22)->nullable();
            $table->string('email')->nullable();
            $table->string('area_info')->nullable();
            $table->string('insulated')->nullable();
            $table->string('wall_type')->nullable();
            $table->string('uniq_session')->nullable();
            $table->integer('users_id')->unsigned()->nullable()->comment('Using for if customer is logged in');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('NO ACTION');
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
        Schema::dropIfExists('customer_orders');
    }
}
