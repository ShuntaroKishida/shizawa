<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShizawaOriginal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <header class="w-full bg-green-700 fixed top-0 left-0 z-10 py-4">
        <div class="max-w-full mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold text-white">酔っぱらい日記</div>
                <div>
                    @if(Auth::check())
                        <span class="text-white pr-4">ようこそ、{{ Auth::user()->name }}さん</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-sm bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded transition-colors duration-200">ログアウト</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm bg-yellow-500 hover:bg-yellow-600 text-gray-800 py-2 px-4 rounded transition-colors duration-200">ログイン</a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <div class="flex pt-16">
        <div class="w-64 bg-white shadow-lg">
            <div class="px-4 py-6">
                <nav class="flex flex-col mt-6">
                    <a href="" class="py-2 text-sm text-gray-700 hover:bg-gray-200">Home</a>
                    <a href="/posts" class="py-2 mt-2 text-sm text-gray-700 hover:bg-gray-200">日記管理</a>
                    <a href="/" class="py-2 mt-2 text-sm text-gray-700 hover:bg-gray-200">ユーザー管理</a>
                </nav>
            </div>
        </div>

        <main class="flex-1 overflow-y-auto p-4">
            @yield('content')
        </main>
    </div>

</body>
</html>