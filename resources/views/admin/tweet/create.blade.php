{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'つぶやきの新規作成'を埋め込む --}}
@section('title', 'つぶやきの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="main-container">
    <h3>ホーム</h3>
        <div class="form">
            <form action="{{ url('admin/tweet/create') }}" method="post" class="post">
                @csrf
                {{-- エラーを表示 --}}
                @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif

                <div>
                    <input type="text" name="body" class="form-control" id="body" placeholder="いまどうしてる？">
                </div>
                <div class="btn">
                    <button type="submit" class="btn btn-primary mt-2">つぶやく</button>
                </div>
            </form>
        </div>


        {{--postsテーブルのデータを表示--}}
            @foreach($data as $tweet)
                <div class="tweet">
                    <div class="info">
                        <p class="info-right">{{ $tweet->user->name }}</p>
                        <p class="info-left">{{ $tweet->created_at}}</p><br>
                    </div>
                    <br>
                    
                    <div class="info">
                        <p class="info-right">{{ $tweet->body }}</p>
                        
                        {{--ログインユーザーが投稿したつぶやきのみに削除リンクを設定--}}
                        @if (Auth::user()->id == $tweet->user_id)
                            <a class="info-left" href="{{ url('admin/tweet/delete?id='.$tweet->id)}}">削除</a>
                        @endif
                    </div>
                    <br>
                </div>
            @endforeach



        <div class="tweets">
           
        </div>

    </div>
@endsection