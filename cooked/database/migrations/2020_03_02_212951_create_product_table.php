<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('id');
            $table->tinyInteger('idCategory')->nullable();
            $table->string('ten_sp')->nullable();
            $table->string('tenkd')->nullable();
            $table->string('anh_sp')->nullable();
            $table->string('content')->nullable();
            $table->timestamps();
        });

    }

    /**
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
