<form action="@if($article) {{route('update-article',$article->id)}} @else {{route('submit-article')}} @endif" method="post">
    @if($article)
        @method('PUT')
    @endif
        @csrf
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            Please fix the following errors
        </div>
    @endif
    <x-article-form-fields :article="$article ?? null"/>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
