@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center">
        <h1 class="text-xl font-bold my-4">投稿一覧</h1>
        <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            新規投稿作成
        </a>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <table class="text-left w-full border-collapse">
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light bg-blue-300">投稿日時</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light bg-blue-300">睡眠時間</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light bg-blue-300">疲労度</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light bg-blue-300">飲酒量</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light bg-blue-300">酔っぱらい度合い</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light bg-blue-300">メモ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-800 font-bold">{{ $post->created_at->format('Y-m-d H:i') }}</a>
                    </td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->sleep }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->tired }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->drink }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->hangover }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->memo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
