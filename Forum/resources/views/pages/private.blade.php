@extends('layouts.main-layout')

@section('title', 'Profile')

@php
    use Illuminate\Support\Carbon;
@endphp

@section('content')

    <div class="cover">
        <div class="container">
            <h1>AMOGUS</h1>
        </div>
    </div>

    <div class="profile">
        <div class="container">
            <div class="yourInfo">
                <div class="iconAndName">
                    <div class="icon shadow">
                        <img src="{{ asset('assets/images/default.png') }}" alt="Avatar">
                        {{-- {{ Auth::user()->avatar }} --}}
                    </div>
                    <div class="name">
                        {{ Auth::user()->name }}
                    </div>
                </div>

                <div class="info whiteBg shadow">
                    <a href="#" class="posts text"><b>0</b>posts</a>
                    <a href="#" class="likes text"><b>0</b>likes</a>
                    <a class="editProfile" href="#">Edit Profile</a>
                </div>
            </div>

            <div class="columns">
                <nav class="column borderRadius whiteBg shadow mainNav">
                    <a class="active" href="/private/asked">Asked</a>
                    <a href="#">Liked</a>
                </nav>

                <div class="column content">

                    <div class="btns">
                        <a href="/ask-question" class="createPost whiteBg shadow btnCommon">Ask a Question</a>

                        <div class="sorting">

                        </div>
                    </div>

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

                    {{-- {{$posts->links('vendor.pagination.default')}} --}}


                </div>
            </div>
        </div>


    </div>



@endsection
