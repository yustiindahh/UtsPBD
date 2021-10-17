<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelPortos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Portos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('content', 500);
            $table->string('image', 100);
            $table->timestamps();
            $table->integer('status');
        });

        DB::table('Portos')->insert(
            array(
                'title' => 'Portfolio',
                'content' => 'Berikut adalah hasil karya saya 2 tahun terakhir, karya tersebut merupakan hasil dari tugas multimedia di semester sebelumnya. Gambar pertama adalah desain produk, pada tugas tersebut juga membuat vidio produk dengan teknik B roll. Gambar kedua adalah desain poster film, yang dibuat semirip mungkin dengan poster film aslinya',
                'image' => 'Port1.jpg;Port2.jpg',
                'created_at' => date('y-m-d', time()),
                'updated_at' => date('y-m-d', time()),
                'status' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
