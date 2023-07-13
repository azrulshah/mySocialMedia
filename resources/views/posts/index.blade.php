@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
@endsection

