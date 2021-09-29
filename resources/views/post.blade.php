@extends ('layout')

@section('content')
    <article>
        <h1>{{$post->title}} </h1>
        <p>{{$post->body}}</div>
    </article>

    <a class="back" href="\">back</a>


@endsection
