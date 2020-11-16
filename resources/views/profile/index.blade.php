@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="title">
                                    <h2>プロフィール</h2>
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                 <div class="name">
                                    {{ "名前：".str_limit($post->name, 150) }}
                                </div>
                                <div class="name">
                                    {{ "趣味：".str_limit($post->hobby, 150) }}
                                </div>
                                <div class="gender">
                                    {{ "性別：".str_limit($post->gender, 1500) }}
                                </div>
                                <div class="created_at">
                                    {{ "登録日時：".str_limit($post->created_at, 1500) }}
                                </div>
                                <div class="updated_at">
                                    {{ "更新日時：".str_limit($post->updated_at, 1500) }}
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection