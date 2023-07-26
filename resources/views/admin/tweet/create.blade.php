{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'つぶやきの新規作成'を埋め込む --}}
@section('title', 'つぶやきの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ホーム</h2>
                <form action="{{ url('admin/tweet/create') }}" method="post">
                    @csrf
                    {{-- エラーを表示 --}}
                    @if (count($errors) > 0)
                       <ul>
                           @foreach($errors->all() as $e)
                               <li>{{ $e }}</li>
                           @endforeach
                       </ul>
                    @endif

                    <div class="mb-3">
                       <input type="text" name="body" class="form-control" id="body" placeholder="いまどうしてる？">
                   </div>
                   <div>
                       <button type="submit" class="btn btn-primary mt-2">つぶやく</button>
                   </div>

                </form>
            </div>
        </div>
        <div>
            @foreach($data as $d)
                <td>{{ $d->body }}</td>
                <td>{{ $d->created_at}}</td>
                
            @endforeach
        </div>
    </div>
@endsection