<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use DB;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     *
     * Allow Auth verify just login in.
     */
    public function __construct ()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //开启QueryLog
        DB::connection()->enableQueryLog();
        if($request->search){
            $articles = Article::where('title', 'like', '%'.$request->search.'%')
                ->orWhere('content', 'like', '%'.$request->search.'%')
                ->get();
        } else {
            $articles = Article::all();
        }
        //查询 sql
        //dd(DB::getQueryLog());

        //$articles = DB::table('article')->paginate(10);
        //dd($articles);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => 'min:8|required',
            'content' => 'required'
        ]);

        $articleObj          = new Article();
        $articleObj->title   = $request->input('title');
        $articleObj->content = $request->input('content');
        $result              = \Auth::user()->articles()->save($articleObj);
        return redirect('/article')->with('create_result', $result ? 'success' : 'failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findorFail($id);
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'   => 'min:8|required',
            'content' => 'required'
        ]);

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ];
        $result = Article::where('id', $id)->update($data);
        return redirect('/article')->with('update_result', $result ? 'success' : 'failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = Article::where('id', $request->id)->delete();
        return $result;
    }
}
