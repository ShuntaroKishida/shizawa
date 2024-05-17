@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">新規投稿</h1>
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

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="sleep" class="block text-gray-700 text-sm font-bold mb-2">睡眠時間:</label>
                <select name="sleep" id="sleep" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" disabled {{ old('sleep') == '' ? 'selected' : '' }}>選択してください</option>
                    <option value="1" {{ old('sleep') == 1 ? 'selected' : '' }}>0〜2時間</option>
                    <option value="2" {{ old('sleep') == 2 ? 'selected' : '' }}>2〜4時間</option>
                    <option value="3" {{ old('sleep') == 3 ? 'selected' : '' }}>4〜6時間</option>
                    <option value="4" {{ old('sleep') == 4 ? 'selected' : '' }}>6〜8時間</option>
                    <option value="5" {{ old('sleep') == 5 ? 'selected' : '' }}>8〜10時間</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="tired" class="block text-gray-700 text-sm font-bold mb-2">疲労度:</label>
                <select name="tired" id="tired" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" disabled {{ old('tired') == '' ? 'selected' : '' }}>選択してください</option>
                    <option value="1" {{ old('sleep') == 1 ? 'selected' : '' }}>超元気</option>
                    <option value="2" {{ old('sleep') == 2 ? 'selected' : '' }}>元気</option>
                    <option value="3" {{ old('sleep') == 3 ? 'selected' : '' }}>普通</option>
                    <option value="4" {{ old('sleep') == 4 ? 'selected' : '' }}>だるい</option>
                    <option value="5" {{ old('sleep') == 5 ? 'selected' : '' }}>めっちゃだるい</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="drink" class="block text-gray-700 text-sm font-bold mb-2">飲酒量:</label>
                <select name="drink" id="drink" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" disabled {{ old('drink') == '' ? 'selected' : '' }}>選択してください</option>
                    <option value="1" {{ old('sleep') == 1 ? 'selected' : '' }}>超少ない</option>
                    <option value="2" {{ old('sleep') == 2 ? 'selected' : '' }}>少ない</option>
                    <option value="3" {{ old('sleep') == 3 ? 'selected' : '' }}>普通</option>
                    <option value="4" {{ old('sleep') == 4 ? 'selected' : '' }}>多い</option>
                    <option value="5" {{ old('sleep') == 5 ? 'selected' : '' }}>浴びた</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="hangover" class="block text-gray-700 text-sm font-bold mb-2">酔っぱらい度合い:</label>
                <select name="hangover" id="hangover" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" disabled {{ old('hangover') == '' ? 'selected' : '' }}>選択してください</option>
                    <option value="1" {{ old('sleep') == 1 ? 'selected' : '' }}>シラフ</option>
                    <option value="2" {{ old('sleep') == 2 ? 'selected' : '' }}>ほぼシラフ</option>
                    <option value="3" {{ old('sleep') == 3 ? 'selected' : '' }}>ちょいダル</option>
                    <option value="4" {{ old('sleep') == 4 ? 'selected' : '' }}>だるい</option>
                    <option value="5" {{ old('sleep') == 5 ? 'selected' : '' }}>二日酔い</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="memo" class="block text-gray-700 text-sm font-bold mb-2">メモ:</label>
                <textarea name="memo" id="memo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3">{{ old('memo') }}</textarea>
            </div>
            <div class="mb-6">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">画像:</label>
                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    投稿
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
