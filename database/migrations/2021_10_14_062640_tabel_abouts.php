<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelAbouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('content', 500);
            $table->string('image', 100);
            $table->timestamps();
            $table->integer('status');
        });

        DB::table('Abouts')->insert(
            array(
                'title' => 'About me',
                'content' => 'Nama Lengkap saya Yusti Indah Wulansari, bisa dipanggil Yusti. Saya lahir di Sidoarjo pada tahun 2001, sekarang saya menjadi seorang mahasiswa di Universitas Negeri Surabaya. Saya mengambil jurusan Teknik Informatika, program studi S1 Pendidikan Teknologi Informasi dan sekarang berada di semester 5.',
                'image' => 'laravel.png',
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
