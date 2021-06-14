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
                        <h2>
                            {{$post->title}}
                        </h2>
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
                            <a href="#" class="likeBtn up"><img src="{{ asset('assets/images/triangle.svg') }}" alt="btn"></a>
                            <span class="likeCounter">{{$post->likes}}</span>
                            <a href="#" class="likeBtn down"><img src="{{ asset('assets/images/triangle.svg') }}" alt="btn"></a>
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
