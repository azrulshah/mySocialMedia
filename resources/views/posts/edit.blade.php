@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Detail</div>

                <div class="card-body">
                   {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PUT']) !!}

                      <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                          {!! Form::label('content', 'Content') !!}
                          {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
                          <small class="text-danger">{{ $errors->first('content') }}</small>
                      </div>

                    <div class="btn-group pull-right">
                        {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}
                    </div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

