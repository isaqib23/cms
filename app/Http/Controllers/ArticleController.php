<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleStoreRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function index() {
        $articles = Article::paginate(5);

        return view('articles')->withArticles($articles);
    }

    /**
     * @return Factory|View
     */
    public function create(){
        return view('create-article');
    }

    /**
     * @param ArticleStoreRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(ArticleStoreRequest $request){
        // Will return only validated data
        $data = $request->validated();

        tap(new Article($data))->save();

        return redirect('/home');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id){
        $article = Article::find($id);

        return view('update-article', compact('article'));
    }

    /**
     * @param ArticleStoreRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update(ArticleStoreRequest $request, $id){
        // Will return only validated data
        $data = $request->validated();

        $article = Article::find($id);
        $article->title = $data['title'];
        $article->save();

        return redirect('/home')->with('success', 'Article updated!');
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/home')->with('success', 'Article deleted!');
    }
}
