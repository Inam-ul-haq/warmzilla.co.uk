<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('finish_id');
            $table->double('finish_price');

            $table->integer('edge_id');
            $table->double('edge_price');

            $table->integer('design_id');
            $table->json('design_dimensions');

            $table->string('substrate');
            $table->double('thickness');
            $table->string('sink_bowl')->nullable();
            $table->boolean('cooking_hob_status')->default(0);
            $table->double('cooking_hob_width')->nullable();
            $table->double('cooking_hob_length')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
