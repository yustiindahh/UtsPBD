@extends('template.userLayout')

@section('content')
<section id="secHome">
    <div class="wrapper">
        <div class="container">
            <header id="head">
                <a href="#" class="logo"><img src="{{ asset('img/laravel.png') }}" width="50px" class="mb-2"> Framework</a>
                <ul>
                    <li><a href="{{url('/')}}" class="{{($status['sts'] == 'home') ? 'active' : ''}} link">Home</a></li>
                    <li><a href="{{url('/about')}}" class="{{($status['sts'] == 'about') ? 'active' : ''}} link">About</a></li>
                    <li><a href="{{url('/porto')}}" class="{{($status['sts'] == 'porto') ? 'active' : ''}} link">Portofolio</a></li>
                    <li><a href="{{url('/adminD')}}" class="{{($status['sts'] == 'admin') ? 'active' : ''}} link"><i class="fa fa-lock"></i> Admin</a></li>
                    @auth
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="link"><i class="fa fa-sign-out"></i> Log out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endauth
                </ul>
            </header>
            <?php if ($status['sts'] == 'admin') { ?>
                <div class="content">
                    <h2>{{$data['title']}}</h2>
                    <p class="mb-0">{{$data['body']}}</p>
                    <div class="form-group mt-1" style="width: 50%;">
                        <input type="text" class="form-control mb-1" value="<?= Auth::user()->email ?>" placeholder="Email" id="emailA" name="emailA">
                    </div>
                    <div class="form-group" style="width: 50%;">
                        <input type="password" class="form-control mb-1" placeholder="Password" id="passA" name="passA">
                    </div>
                    <button class="btn btn-light" id="loginA" style="color: #8a2435; border: 0px; border-radius: 25px; font-weight: 500;"><i class="fa fa-sign-in mr-1"></i> Log in</button>
                    <div class="blink mb-1 py-0 text-right">
                        <a href="https://iconscout.com/icons/laravel" target="_blank"></a>
                    </div>
                </div>
                <div class="person" style="width: 400px;">
                    @if(isset($data['img']))
                    <img class="imgPerson" src="<?= asset('img/' . $data['img']) ?>" alt="">
                    @endif
                </div>
            <?php } else { ?>
                <div class="content">
                    @if(isset($data))
                    <h2>{{$data['title']}}</h2>
                    <p>
                        <?php if (strlen($data['body']) > 280) {
                            echo substr($data['body'], 0, 280) . '...';
                        } else {
                            echo $data['body'];
                        } ?>
                    </p>
                    <a class="btnR" href="{{url('/r_'.$status['sts'])}}">{{$data['foot']}}</a>
                    @endif
                </div>
                <div class="person">
                    @if(isset($data['img']))
                    <img class="imgPerson" src="<?= asset('img/' . $data['img']) ?>" alt="">
                    @endif
                    @if($status['sts'] == 'porto' && isset($porto))
                    <img class="imgPort" src="<?= asset('img/' . $porto[0]['gambar']) ?>" alt="">
                    <img class="imgPort2" src="<?= asset('img/' . $porto[1]['gambar']) ?>" alt="">
                    @endif
                </div>
            <?php } ?>
            <div class="scm">
                <ul>
                    <li><a href="https://www.facebook.com/yustiindah.wulansari/" target="_blank"><i class="fa fa-facebook-official mx-2"></i></a></li>
                    <li><a href="https://www.instagram.com/yustiindahh/" target="_blank"><i class="fa fa-instagram mx-2"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection