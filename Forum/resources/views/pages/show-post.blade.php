@extends('layouts.main-layout')

@section('title', $post->title)



@section('content')

    <div class="cover">
        <div class="container">
            <h1>AMOGUS</h1>
        </div>
    </div>

    <div class="container showPost">

        {{-- Nav --}}

        <div class="columns">
            @include('includes.nav')

            {{-- Posts --}}

            <div class="column content">

                <div class="post borderRadius whiteBg shadow">
                    <div class="title">
                        <div class="titleRow">
                            <h2>
                                {{$post->title}}
                            </h2>

                            @if ($post->user_id == Auth::user()->id)
                                <div class="editBtns">
                                    <a href="{{route('editPost', [$post->category['slug'], $post->slug])}}"
                                        title='Edit post'>
                                        <img src="{{ asset('assets/images/edit-button.svg') }}" alt="Edit post" >
                                    </a>
                                    <a class="close" href="#" title='Delete post'><img src="{{ asset('assets/images/close.svg') }}" alt="Edit post" ></a>
                                </div>
                            @endif

                        </div>
                        <div class="dateInfo">
                            <span class="created">Asked <span>

                                @php
                                    use Illuminate\Support\Carbon;
                                    $DeferenceInDays = Carbon::parse(Carbon::now())->diffInDays($post->created_at);
                                @endphp

                                {{ $DeferenceInDays }} days

                            </span> ago</span>

                            <span class="viewed">Viewed <span>16 times</span></span>

                        </div>
                    </div>

                    <div class="description">
                        <div class="likes">
                            <form action="" method="POST">
                                <button value="1" name="like"
                                class="likeBtn up"><img src="{{ asset('assets/images/triangle.svg') }}" alt="btn"></button>
                                <span class="likeCounter">{{$post->likes}}</span>
                                <button value="0" name="dislike"
                                class="likeBtn down"><img src="{{ asset('assets/images/triangle.svg') }}" alt="btn"></button>
                            </form>
                        </div>
                        <div class="decriptionAndCategories">
                            <p>
                                {{$post->description}}
                            </p>
                            <div class="categories">
                                <a href="{{route('getPostsByCategory', $post->category['slug'])}}"
                                   class="category">
                                   {{$post->category->title}}
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="commentPart">
                        <span class="noComments borderRadius">
                            No comments yet.
                        </span>
                    </div>



                </div>

            </div>










@endsection
