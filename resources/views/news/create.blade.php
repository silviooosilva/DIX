@extends('layouts.app', ['page' => __('Create News'), 'pageSlug' => 'createnews'])

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Create News') }}</h5>
            </div>
            <form method="post" action="{{ route('news.store') }}" autocomplete="off" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('post')

                    @include('alerts.success')

                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                        <label>{{ _('Title') }}</label>
                        <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title">
                        @include('alerts.feedback', ['field' => 'title'])
                    </div>

                    <div class="form-group{{ $errors->has('author') ? ' has-danger' : '' }}">
                        <label>{{ _('Author') }}</label>
                        <input type="text" name="author" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" placeholder="Author">
                        @include('alerts.feedback', ['field' => 'author'])
                    </div>

                    <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                        <label>{{ _('Content') }}</label>
                        <textarea name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" rows="8" cols="32" placeholder="Content"></textarea>
                        @include('alerts.feedback', ['field' => 'content'])
                    </div>

                    <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                        <label>{{ _('Photo - Clique para inserir') }}</label>
                        <input type="file" name="photo" class="form-control">
                        @include('alerts.feedback', ['field' => 'photo'])
                    </div>

                    <input type="hidden" name="created_by" value="{{ auth()->user()->name }}">

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
