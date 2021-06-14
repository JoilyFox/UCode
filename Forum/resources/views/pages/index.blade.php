@extends('layouts.main-layout')

@section('title', 'Forum')

@php
    use Illuminate\Support\Carbon;
@endphp

@section('content')


    <div class="cover">
        <div class="container">
            <h1>AMOGUS</h1>
        </div>
    </div>

    <div class="container">

        <div class="caption">
            <h2>All Questions</h2>
        </div>



        <div class="columns">

            {{-- Nav --}}
            @include('includes.nav')

            <div class="mainIndexContent">



                <div class="column content">

                    @auth
                    {{-- btns --}}

                    <div class="btns">
                        <a href="/ask-question" class="createPost whiteBg shadow btnCommon">Ask a Question</a>

                        <div class="sorting">

                        </div>
                    </div>
                    @endauth

                    {{-- Posts --}}
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)

                            <div class="post borderRadius whiteBg shadow">

                                <div class="leftPart">
                                    <a class="item" href="{{route('getPost', [$post->category['slug'], $post->slug])}}">
                                        <span class="number">0</span>
                                        <span class="text">votes</span>
                                    </a>
                                    <span class="border"></span>
                                    <a class="item" href="{{route('getPost', [$post->category['slug'], $post->slug])}}">
                                        <span class="number">0</span>
                                        <span class="text">answers</span>
                                    </a>
                                </div>

                                <div class="rightPart">

                                    <div class="titleAndDateInfo">
                                        <div class="title">
                                            <a href="{{route('getPost', [$post->category['slug'], $post->slug])}}">
                                                {{$post['title']}}
                                            </a>
                                        </div>

                                        <div class="dateInfo">
                                            <span class="created">Asked <span>
                                                @php $DeferenceInDays = Carbon::parse(Carbon::now())->diffInDays($post->created_at); @endphp

                                                {{ $DeferenceInDays }} days
                                            </span> ago</span>
                                        </div>
                                    </div>


                                    <div class="description">
                                        <p class="letterLimit">{{$post['description']}}</p>
                                    </div>

                                    <div class="categoriesAndUserName">
                                        <div class="categories">
                                            <a href="{{route('getPostsByCategory', $post->category['slug'])}}"
                                            class="category">
                                            {{$post->category['title']}}
                                            </a>
                                        </div>

                                        <a href="#" class="userInfo">
                                            <div class="avatar">
                                                <img src="{{ asset('assets/images/default.png') }}" alt="">
                                            </div>
                                            <span class="name">
                                                {{ $post->user->name }}
                                            </span>
                                        </a>
                                    </div>



                                </div>

                            </div>

                        @endforeach
                    @elseif (count($posts) === 0)
                        <div class="post noPosts borderRadius whiteBg shadow">
                            So far, there are no posts. Create a new one to make them appear!
                        </div>
                    @endif


                    {{-- Pagination  --}}

                    {{$posts->links('vendor.pagination.default')}}

                </div> {{-- //Posts --}}


                {{-- Categories --}}

                <div class="column categories borderRadius whiteBg shadow">
                    <a href="/">
                        All
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{route('getPostsByCategory', $category['slug'])}}">
                            {{$category['title']}}
                        </a>
                    @endforeach
                </div>

            </div>

        </div>
    </div>









@endsection
