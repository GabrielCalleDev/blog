@extends('layouts.blog')
@section('title', 'Posts del blog')

@section('content')
<!-- Posts -->
<div class="row justify-content-center mt-md-4">
    <div class="col-11 col-xl-9">
        <div class="row">
            <!-- Posts -->
            @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4 col-12 justify-content-center mb-5">
                <div class="card m-auto" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset($post->image) }}" alt="{{ $post->post }}">
                    <div class="card-body">
                        <small class="card-txt-category">{{ $post->category->category_name }}</small>
                        <h5 class="card-title my-2">{{ $post->post }}</h5>
                        <div class="d-card-text">
                            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                            eius corrupti nulla veniam, molestias nemo repudiandae? -->
                            {{ $post->content }}
                        </div>
                        <a href="{{ route('post', $post->id) }}" class="post-link"><b>Leer más</b></a>
                        <hr>
                        <div class="row">
                            <div class="col-6 text-left">
                                <span class="card-txt-author">{{ $post->author }}</span>
                            </div>
                            <div class="col-6 text-right">
                                <span class="card-txt-date">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-12">
        <!-- Paginador -->

    </div>
</div>
@endsection