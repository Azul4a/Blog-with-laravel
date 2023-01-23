@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at->format('F d, Y') }} by
                            Start Bootstrap
                        </div>
                        <!-- Post category-->

                        Category: <a class="badge bg-secondary text-decoration-none link-light"
                                     href="{{ route('post.index').'?category_id='.$post->category->id }}">{{ $post->category->title }}</a>

                        @unless(!$post->tags)
                            <div>Tags:
                                @foreach($post->tags as $tag)
                                    <a class="badge bg-secondary text-decoration-none link-light"
                                       href="#!">{{ $tag->title }}</a>
                                @endforeach
                            </div>
                        @endunless
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded"
                                              src="{{ str_replace('640x480', '900x400', $post->thumbnail) }}"
                                              alt="..."/></figure>
                    <!-- Post content-->
                    <section class="mb-5">{{ $post->content }}</section>
                </article>
                <!-- Comments section-->
                @include('includes.post.comment', $post->comments)
            </div>
            <!-- Side widgets-->
            @include('includes.post.sidebar', $categories)
        </div>
    </div>

@endsection
