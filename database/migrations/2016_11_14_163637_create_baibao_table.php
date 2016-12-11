<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaibaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_baibao', function (Blueprint $table) {
            $table->string('id_baibao',20)->unique();
            $table->text('url_baibao');
            $table->text('title_baibao');
            $table->text('url_image');
            $table->text('content');
            $table->integer('id_theloai')->unsigned();
            $table->foreign('id_theloai')->references('id_theloai')->on('tbl_theloai')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_baibao');
    }
}
