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
    <h2 class="sub-header">文章列表</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>序号</th>
                <th>标题</th>
                <th>内容</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @forelse($articles as $key => $article)
                <tr id="node_{{$article->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->content}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>
                        <a href="{{url('article/'.$article->id)}}">详情</a>
                        <a href="{{url('article/'.$article->id.'/edit')}}">编辑</a>
                        <a href="javascript:doDestroy({{$article->id}});">删除</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">暂时还没有记录哦~</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        @if(session()->has('create_result') || session()->has('update_result'))
            alert('{{session('create_result')}}{{session('update_result')}}');
        @endif

        /**
         * 删除文章
         */
        function doDestroy(id) {
            if(confirm('Are you sure?')){
                $.post('/article/destroy', {'id':id, '_method':'DELETE'}, function(e){
                    if(e){
                        $('#node_'+id).remove();
                    }
                });
            }
        }
    </script>
@endsection