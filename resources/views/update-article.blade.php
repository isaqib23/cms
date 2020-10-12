@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit Article</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('update-article',$article->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ $article->title }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
