@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Article</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-article-form :article="$article ?? null"/>
            </div>
        </div>
    </div>
@endsection
