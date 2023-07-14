@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Detail</div>

                <div class="card-body">
                   {{$post->content}}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3 class="mt-3">Comments:</h3>
            {!! Form::open(['method' => 'POST', 'route' => 'comment.store']) !!}
                {!! Form::hidden('post_id', $post->id, ['id'=>'post_id']) !!}
                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    {!! Form::label('content', 'Comment:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                </div>
                <div class="btn-group ">
                    {!! Form::submit("Post", ['class' => 'btn btn-primary ']) !!}
                </div>
            {!! Form::close() !!}
            @foreach ($post->comments as $comment)
            <div class="card mt-2">
                <div class="card-body">
                    <p class="card-text">
                        <strong>{{$comment->id}}. {{$comment->user->name}}</strong> {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans(\Carbon\Carbon::now())}}<br>
                        {{$comment->content}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

