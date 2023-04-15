@extends('layouts.app', ['page' => __('Index news'), 'pageSlug' => 'news'])

@section('content')


<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Your News</h4>
                            @include('alerts.success')

                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">Create News</a>
                            <form method="post" action="{{ route('news.search') }}">
                                @csrf
                                @method('post')
                                <input type="text" name="search" class="form-control" placeholder="Find your news - Type the title

                                ">
                                <input type="submit" class="btn btn-secondary" value="Search">
                            </form>
                        </div>
                    </div>
                </div>
                @if(count($data) > 0)
                @foreach($data as $news)
                <div class="card d-flex ml-5 justify-content-center align-items-center flex-direction-row" style="width: 15rem;">
                    <img src="{{ url("storage/{$news->photo}") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><b>Title:</b> {{ $news->title }}</h4>
                        <h4 class="card-subtitle">Author: {{ $news->author }}</h4>
                        <p class="card-text">{{ Str::limit($news->content, 50) }}</p>
                        <a href="{{ route('news.show', $news->id) }}" class="btn btn-primary">Show more</a>
                    </div>
                </div>
                @endforeach
                @else
                <div class="d-flex justify-content-center align-items-center">
                    <h1>No news published yet.</h1>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
