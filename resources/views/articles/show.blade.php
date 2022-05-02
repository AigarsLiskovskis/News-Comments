@extends('layout.layout')

@section('content')
    <article>
        <h1>
            {{ $article->title }}
        </h1>
        <p>
            By<a href="/writers/{{ $article->writer->name }}">{{ $article->writer->name }}</a>
            in<a href="/categories/{{ $article->category->name }}">{{ $article->category->name }}</a>
        </p>
        <div>
            <p>
                {{ $article->body }}
            </p>
        </div>
        @auth
            <div class="links">
                <a href="/articles/edit/{{ $article->id }}">Edit</a>
                <form method="POST" action="/articles/delete/{{ $article->id }}">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endauth
    </article>
    <div class="links">
        <a href="/">Go back</a>
    </div>

    <form method="POST" action="/articles/{{ $article->id }}/comments" class="comment">
        @csrf
        <div>
            Leave a comment
        </div>
        <div class="addComment">
            <textarea name="comment" id="" cols="30" rows="3" placeholder="Write down your thoughts"
                      required></textarea>
        </div>
        <div>
            <button type="submit">Post</button>
        </div>
    </form>

    @foreach($article->comments as $comment)
        <div class="comment">
            <section>
                <div>
                    {{ $comment->comment }}
                </div>
                <foother>
                    <small>
                        Posted
                        <time>{{ $comment->created_at->diffForHumans() }}</time>
                    </small>
                </foother>
            </section>
            @auth
                <form method="POST" action="/articles/delete/{{ $comment->id }}">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            @endauth
        </div>
    @endforeach
@endsection
