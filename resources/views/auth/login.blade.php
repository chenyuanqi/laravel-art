@extends('public.basic')
@section('menu')
    <ul class="nav nav-sidebar">
        <li class="active"><a href="/">文章列表</a>
        </li>
        <li><a href="/article/create">新增文章</a>
        </li>
    </ul>
@endsection
@section('body')
    <h2 class="sub-header">用户登录</h2>
    <form method="POST" action="{{url('/auth/login')}}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="inputEmail1">邮件地址：</label>
            <input name="email" type="email" class="form-control" id="inputEmail1" placeholder="邮件地址" value="{{session('email') ? session('email') : old('email')}}">
            @if($errors->has('email'))
                <p class="text-danger">*{{$errors->first('email')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="inputPassword">登录密码：</label>
            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="登录密码" value="{{session('password')}}">
            @if($errors->has('password'))
                <p class="text-danger">*{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" @if(old('remember') || session()->has('remember')) checked @endif> Remember me?
            </label>
            <label>
                <a href="#">忘记密码?</a>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">立即登录</button>

    </form>
@endsection
