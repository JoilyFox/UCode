@extends('layouts.main-layout')

@section('title', 'Forum')

@section('additionalProperties')
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="askQuestionContainer">
    <h2>Edit your question</h2>

    <div class="askQuestionBlock borderRadius whiteBg shadow">
        <form action="{{ route('updatePost') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="formGroup">
                <label for="aQtitle">
                    <h3>Caption</h3>
                    {{-- <p>Be specific. Imagine that you are asking a question to another person.</p> --}}
                </label>
                <input class="borderRadius" type="text" name="title" id="aQtitle" autocomplete="off"
                value="{{ $post->title }}">
                @error('title')
                <div class="error">
                    <p>Error</p>
                </div>
                @enderror
            </div>

            <div class="formGroup">
                <label for="aQcontent">
                    <h3>Main part</h3>
                    {{-- <p>Add all the information you might need to answer your question.</p> --}}
                </label>
                <textarea class="borderRadius" type="text" name="content" id="aQcontent"  autocomplete="off" rows="10">{{ $post->description }}</textarea>
                @error('content')
                <div class="error">
                    <p>Error</p>
                </div>
                @enderror
            </div>

            <div class="formGroup">
                <label for="aQcategories">
                    <h3>Tags</h3>
                    {{-- <p>Add some tags describing what your question is about.</p> --}}
                </label>
                <input class="borderRadius" type="text" name="categories" id="aQcategories" autocomplete="off"
                value="{{ $category->title }}">
                @error('categories')
                <div class="error">
                    <p>Error</p>
                </div>
                @enderror
            </div>

            <div class="formGroup btn">
                <button class="btnCommon" type="submit" name="sendMe" value="1">Ask your question</button>
            </div>
        </form>
    </div>
</div>
@endsection
