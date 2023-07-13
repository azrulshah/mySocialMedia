@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#createMdl">
                Create New Post
            </button>
        </div>
        <div class="col-md-8">
            @foreach ($posts as $post)
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="card-text">
                                {{$post->content}} <br>
                                <a href="/post/{{Crypt::encrypt($post->id)}}" class="btn btn-primary">View Detail</a>
                            </p>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'post.store']) !!}
            <div class="modal-body">
                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    {!! Form::label('content', 'What\'s on your mind?') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

