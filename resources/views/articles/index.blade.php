@extends('layout.layout')

@section('content')
    @foreach($articles as $article)
        <article>
            <h1>
                <a href="/articles/{{ $article->id }}">
                    {{ $article->title }}
                </a>
            </h1>
            <small>
                By<a href="/writers/{{ $article->writer->name }}">{{ $article->writer->name }}</a>
            </small>
            <div>
                {{ $article->excerpt }}
            </div>
        </article>
    @endforeach
@endsection
