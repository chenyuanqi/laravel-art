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
    <h2 class="sub-header">用户注册</h2>
    <form method="POST" action="{{url('/auth/register')}}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="userName">用户名称：</label>
            <input name="name" type="text" class="form-control" id="userName" placeholder="用户名" value="{{old('name')}}">
            @if($errors->has('name'))
                <p class="text-danger">*{{$errors->first('name')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="inputEmail1">邮件地址：</label>
            <input name="email" type="email" class="form-control" id="inputEmail1" placeholder="邮件地址"
                   value="{{old('email')}}">
            @if($errors->has('email'))
                <p class="text-danger">*{{$errors->first('email')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="inputPassword1">登录密码：</label>
            <input name="password" type="password" class="form-control" id="inputPassword1" placeholder="登录密码"
                   value="{{old('password')}}">
            @if($errors->has('password'))
                <p class="text-danger">*{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="inputPassword2">确认密码：</label>
            <input name="password_confirmation" type="password" class="form-control" id="inputPassword2"
                   placeholder="确认密码" value="{{old('password_confirmation')}}">
            @if($errors->has('password_confirmation'))
                <p class="text-danger">*{{$errors->first('password_confirmation')}}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">立即注册</button>
    </form>
@endsection
