@extends('layout.layout')

@section('content')
    <form method="POST" action="/articles/store" class="comment">
        @csrf
        <div>
            Add new Article
        </div>

        <div>
            <label id="title">
                Title
                <input id="title" type="text" name="title" value="{{ old('title') }}">
            </label>
            @error('title')
            <small style="color: red; ">{{ $message }}</small>
            @enderror

            <label for="category">Category</label>
            <select name="category_id" id="category">
                @foreach(\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="excerpt">Excerpt</label>
            <textarea name="excerpt" id="excerpt" cols="30" rows="2" placeholder="Short excerpt of article"
            >{{ old('excerpt') }}</textarea>
            @error('excerpt')
            <small style="color: red; ">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" placeholder="Main body of article"
            >{{ old('body') }}</textarea>
            @error('body')
            <small style="color: red; ">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <button type="submit">Publish</button>
        </div>
    </form>
@endsection
