@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{ $date->translatedFormat('F') }}  {{$date->day}} {{$date->year}}
                * {{$date->format('H:i')}}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content  !!}
                    </div>
                </div>
                <div class="col-2">
                    <a href="{{ route('post.index') }}" class="btn btn-dark">Вернуться</a>
                </div>
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                            <div class="row">
                                @foreach($relatedPosts as $post)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{ $post->category->title }}</p>
                                        <a href="{{ route('post.show', $post->id) }}">
                                            <h5 class="post-title">{{ $post->title }}</h5>
                                        </a>
                                    </div>
                            @endforeach
                        </section>
                    </div>
                </div>
        </div>
    </main>
@endsection
