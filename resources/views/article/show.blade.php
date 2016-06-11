@extends('public.basic')
@section('menu')
    <ul class="nav nav-sidebar">
        <li class="active"><a href="/article">文章列表</a>
        </li>
        <li><a href="/article/create">新增文章</a>
        </li>
    </ul>
@endsection
@section('body')
    <h2 class="sub-header">
        {{$article->title}}
        <small>
            @if($article->user_id)
            author：{{$article->user->name}}
            @endif
            <a href="javascript:history.back();">[返回文章列表]</a>
        </small>
    </h2>
    <hr/>
    <p>{!! $article->content !!}</p>
@endsection
