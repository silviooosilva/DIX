@extends('layouts.app', ['page' => __('Search news'), 'pageSlug' => 'search'])

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title h2">Search results</h4>

                        </div>
                        <hr class="my-3 w-100">
                    </div>
                </div>
                @if(count($data) > 0)
                @foreach($data as $news)
                <div class="card d-flex ml-5" style="width: 10rem;">
                    <img src="{{ url("storage/{$news->photo}") }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <h5 class="card-subtitle">{{ $news->author }}</h5>
                        <p class="card-text">{{ Str::limit($news->content, 40) }}</p>
                        <a href="{{ route('news.show', $news->id) }}" class="btn btn-primary">Show more</a>
                    </div>
                </div>
                @endforeach
                @else
                <h1 class="d-flex justify-content-center align-items-center">Not found</h1>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection
