@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">投稿の編集</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8">

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p class="font-bold">エラーが発生しました</p>
                <ul class="mt-3 list-disc list-inside text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="sleep" class="block text-gray-700 text-sm font-bold mb-2">睡眠時間:</label>
                <select name="sleep" id="sleep" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach([1 => '0〜2時間', 2 => '2〜4時間', 3 => '4〜6時間', 4 => '6〜8時間', 5 => '8〜10時間'] as $value => $text)
                        <option value="{{ $value }}" {{ old('sleep', $post->sleep) == $value ? 'selected' : '' }}>{{ $text }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="tired" class="block text-gray-700 text-sm font-bold mb-2">疲労度:</label>
                <select name="tired" id="tired" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach([1 => '超元気', 2 => '元気', 3 => '普通', 4 => 'だるい', 5 => 'めっちゃだるい'] as $value => $text)
                        <option value="{{ $value }}" {{ old('tired', $post->tired) == $value ? 'selected' : '' }}>{{ $text }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="drink" class="block text-gray-700 text-sm font-bold mb-2">飲酒量:</label>
                <select name="drink" id="drink" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach([1 => '超少ない', 2 => '少ない', 3 => '普通', 4 => '多い', 5 => '浴びた'] as $value => $text)
                        <option value="{{ $value }}" {{ old('drink', $post->drink) == $value ? 'selected' : '' }}>{{ $text }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="hangover" class="block text-gray-700 text-sm font-bold mb-2">酔っぱらい度合い:</label>
                <select name="hangover" id="hangover" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach([1 => 'シラフ', 2 => 'ほぼシラフ', 3 => 'ちょいダル', 4 => 'だるい', 5 => '二日酔い'] as $value => $text)
                        <option value="{{ $value }}" {{ old('hangover', $post->hangover) == $value ? 'selected' : '' }}>{{ $text }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="memo" class="block text-gray-700 text-sm font-bold mb-2">メモ:</label>
                <textarea name="memo" id="memo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3">{{ $post->memo }}</textarea>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">画像:</label>
                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($post->image)
                    <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Post Image" class="w-32 h-32 object-cover mt-2">
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    更新
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
