<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageBuilderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_builder_details', function (Blueprint $table) {
            $table->id();
            $table->integer('section_ids');
            $table->string('page_name');
            $table->string('page_favicon');
            $table->string('page_url');
            $table->string('page_title');
            $table->string('page_desc');
            $table->string('page_key');
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
        Schema::dropIfExists('page_builder_details');
    }
}
