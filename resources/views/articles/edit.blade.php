@extends('layout.layout')

@section('content')
    <div class="createUpdate">
        <form method="POST" action="/articles/update/{{ $article->id }}" class="comment">
            @csrf
            @method('PATCH')
            <div>
                Edit Article
            </div>

            <div>
                <label id="title">
                    Title
                    <input id="title" type="text" name="title" value="{{ $article->title }}">
                </label>
                @error('title')
                <small style="color: red; ">{{ $message }}</small>
                @enderror

                <label for="category">Category</label>
                <select name="category_id" id="category">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $article->category_id) === $category->id ? 'selected' : '' }}
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="3" placeholder="Short excerpt of article"
                >{{ $article->excerpt }}</textarea>
                @error('excerpt')
                <small style="color: red; ">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="15" placeholder="Main body of article"
                >{{ $article->body }}</textarea>
                @error('body')
                <small style="color: red; ">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <button type="submit">Edit</button>
            </div>
        </form>
    </div>
@endsection
