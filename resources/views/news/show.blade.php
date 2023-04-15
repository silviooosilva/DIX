@extends('layouts.app', ['page' => __('Show news'), 'pageSlug' => 'show'])

@section('content')
<div class="jumbotron">
    <h1 class="display-4">{{ $data->title }}</h1>


    <figure class="figure">
        <img src="{{ url("storage/$data->photo") }}">
        <figcaption class="figure-caption">News image</figcaption>
    </figure>


    <p class="h4">Author: {{ $data->author }}</p>
    <hr class="my-4">
    <h3>{{ $data->content }}</h3>
    <hr class="my-4">
    <p class="lead">
    <form method="post" action="{{ route('news.delete', $data->id) }}">
        @csrf
        <input type="submit" class="btn btn-danger" role="button" value="Delete news">
    </form>
    <a class="btn btn-info btn-small" href="{{ route('update.show', $data->id) }}" role="button">Edit news</a>
    </p>
</div>
@endsection
