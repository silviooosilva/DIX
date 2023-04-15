@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users_add'])

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Add new user') }}</h5>
            </div>
            <form method="post" action="{{ route('users.create') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('post')

                    @include('alerts.success')

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ _('Name') }}</label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" value="{{ old('name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ _('Email address') }}</label>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email address') }}" value="{{ old('email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ _('Password') }}</label>
                        <input type="password" name="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Password') }}" value="{{ old('password') }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                </div>
            </form>
        </div>
    </div>

    @endsection
