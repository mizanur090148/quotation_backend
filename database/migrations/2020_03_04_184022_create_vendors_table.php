<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vendor_name', 60);
            $table->string('trn_no', 60);
            $table->string('address', 120)->nullable();
            $table->string('telephone_no', 50)->nullable();
            $table->string('fax_no', 50)->nullable();
            $table->string('vendor_no', 50)->nullable();
            $table->string('attention', 50)->nullable();
            $table->string('attention_designation', 50)->nullable();
            $table->string('email', 40)->nullable();
            $table->string('mobile_no', 20)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->unsignedBigInteger('factory_id')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
