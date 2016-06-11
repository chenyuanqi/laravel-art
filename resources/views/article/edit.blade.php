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
    <h2 class="sub-header">修改文章</h2>
    <form method="POST" action="/article/{{$article->id}}">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="title" class="form-control" id="title" value="{{old('title') ? old('title') : $article->title}}"
                   placeholder="文章标题">
            @if($errors->has('title'))
                <p class="text-danger">*{{$errors->first('title')}}</p>
            @endif
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control" id="content" cols="96" rows="10"
                      placeholder="文章内容">{{old('content') ? old('content') : $article->content}}</textarea>
            @if($errors->has('content'))
                <p class="text-danger">*{{$errors->first('content')}}</p>
            @endif
        </div>
        <input type="hidden" name="_method" value="PUT">
        <button type="submit" class="btn btn-default">提交</button>
    </form>
@endsection
