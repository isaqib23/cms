@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped custab">
                    <thead>
                    <a href="{{route('create-article')}}" class="btn btn-primary btn-xs pull-right add_article"><b>+</b> Add new article</a>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{$article->id}}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->created_at}}</td>
                            <td>{{$article->updated_at}}</td>
                            <td class="text-center">
                                <a class='btn btn-info btn-xs' href="{{route('edit-article',$article->id)}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <form class="delete_article" action="{{ route('delete-article', $article->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="article_paginate col-md-12">
                {{$articles->links()}}
            </div>
        </div>
    </div>
@endsection
