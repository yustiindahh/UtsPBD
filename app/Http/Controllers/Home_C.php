<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Home_C extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $home = DB::table('homes')->where('status', 1)->get();
        $status = [
            'sts' => 'home'
        ];
        $data = [
            'title' => $home[0]->title,
            'body' => $home[0]->content,
            'foot' => 'Read More',
            'img' => $home[0]->image
        ];
        return view('home', ['status' => $status, 'data' => $data]);
    }
    public function about()
    {
        $about = DB::table('abouts')->where('status', 1)->get();
        $status = [
            'sts' => 'about'
        ];
        $data = [
            'title' => 'About Me',
            'body' => 'Nama Lengkap saya Yusti Indah Wulansari, bisa dipanggil Yusti. Saya lahir di Sidoarjo pada tahun 2001, sekarang saya menjadi seorang mahasiswa di Universitas Negeri Surabaya. Saya mengambil jurusan Teknik Informatika, program studi S1 Pendidikan Teknologi Informasi dan sekarang berada di semester 5.',
            'foot' => 'Read More',
            'img' => 'TI.jpg'
        ];
        return view('home', ['status' => $status, 'data' => $data]);
    }
    public function porto()
    {
        $portodb = DB::table('portos')->where('status', 1)->get();
        $status = [
            'sts' => 'porto'
        ];
        $data = [
            'title' => $portodb[0]->title,
            'body' => 'Berikut adalah hasil karya saya 2 tahun terakhir, karya tersebut merupakan hasil dari tugas multimedia di semester sebelumnya. Gambar pertama adalah desain produk, pada tugas tersebut juga membuat vidio produk dengan teknik B roll. Gambar kedua adalah desain poster film, yang dibuat semirip mungkin dengan poster film aslinya.',
            'foot' => 'Read More',
            'img' => ''
        ];
        if ($portodb[0]->image != null) {
            $gb1 = explode(';', $portodb[0]->image)[0];
            $gb2 = explode(';', $portodb[0]->image)[1];
            $porto = [
                [
                    'judul' => 'Desain Produk',
                    'gambar' => 'Port1.jpg'
                ],
                [
                    'judul' => 'Desain Poster',
                    'gambar' => 'Port2.jpg'
                ]
            ];
        }
        return view('home', ['status' => $status, 'data' => $data, 'porto' => $porto]);
    }
    public function admin()
    {
        $status = [
            'sts' => 'admin'
        ];
        $data = [
            'title' => 'Administrator',
            'body' => 'Masuk ke halaman admin jika Anda seorang admin, Anda dapat mengubah konten halaman dasbor ini melalui Halaman Admin.',
            'img' => 'lte2.png'
        ];
        return view('home', ['status' => $status, 'data' => $data]);
    }

    public function show()
    {
        return view('welcome', ['judul' => 'ITB ASIA']);
    }

    public function pass($id)
    {
        return view('welcome', ['judul' => $id]);
    }

    public function r_home()
    {
        $home = DB::table('homes')->where('status', 1)->get();
        $data = [
            'title' => $home[0]->title,
            'body' => $home[0]->content,
            'foot' => 'Read More',
            'img' => $home[0]->image
        ];
        return view('read.r_home', ['data' => $data]);
    }

    public function r_about()
    {
        $about = DB::table('abouts')->where('status', 1)->get();
        $data = [
            'title' => 'About Me',
            'body' => 'Nama Lengkap saya Yusti Indah Wulansari, bisa dipanggil Yusti. Saya lahir di Sidoarjo pada tahun 2001, sekarang saya menjadi seorang mahasiswa di Universitas Negeri Surabaya. Saya mengambil jurusan Teknik Informatika, program studi S1 Pendidikan Teknologi Informasi dan sekarang berada di semester 5.',
            'foot' => 'Read More',
            'img' => $about[0]->image
        ];
        return view('read.r_about', ['data' => $data]);
    }

    public function r_porto()
    {
        $portodb = DB::table('portos')->where('status', 1)->get();
        $data = [
            'title' => $portodb[0]->title,
            'body' => 'Berikut adalah hasil karya saya 2 tahun terakhir, karya tersebut merupakan hasil dari tugas multimedia di semester sebelumnya. Gambar pertama adalah desain produk, pada tugas tersebut juga membuat vidio produk dengan teknik B roll. Gambar kedua adalah desain poster film, yang dibuat semirip mungkin dengan poster film aslinya.',
            'foot' => 'Read More',
            'img' => ''
        ];
        return view('read.r_porto', ['data' => $data]);
    }
}
