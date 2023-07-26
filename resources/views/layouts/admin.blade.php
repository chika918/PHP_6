

   <!-- CSRF Token -->
   {{-- 後の章で説明します --}}
   <meta name="csrf-token" content="{{ csrf_token() }}">


   {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
   <title>@yield('title')</title>


   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> 


   <!-- Scripts -->
   {{-- Laravel標準で用意されているJavascript/scssを読み込みます --}}
   @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>
<body>
   <div id="app">
       {{-- 画面上部に表示するナビゲーションバーです。 --}}
       <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           <div class="container">
               <a class="navbar-brand" href="{{ url('/admin/tweet') }}">
                   {{ config('app.name', 'Laravel') }}
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                   <span class="navbar-toggler-icon"></span>
               </button>


               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <!-- Left Side Of Navbar -->
                   <ul class="navbar-nav me-auto">


                   </ul>


                   <!-- Right Side Of Navbar -->
                   <ul class="navbar-nav ms-auto">
                       <!-- Authentication Links -->
                       {{-- 未ログイン時に表示するヘッダーメニュー --}}
                       @guest
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                           </li>
                       {{-- ログイン時に表示するヘッダーメニュー --}}
                       @else
                           <li class="nav-item dropdown">
                               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->name }}
                               </a>


                               <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>


                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                   </form>
                               </div>
                           </li>
                       @endguest
                   </ul>
               </div>
           </div>
       </nav>
       {{-- ここまでナビゲーションバー --}}


       <main class="py-4">
        {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
        @yield('content')
       </main>
   </div>
</body>
</html>