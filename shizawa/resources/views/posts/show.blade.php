@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">投稿の詳細</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <tbody>
                    <tr class="text-left">
                        <th class="border px-4 py-2 bg-blue-300">項目</th>
                        <th class="border px-4 py-2 bg-blue-300">情報</th>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">投稿日時</td>
                        <td class="border px-4 py-2">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">睡眠時間</td>
                        <td class="border px-4 py-2">{{ $post->sleep }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">疲労度</td>
                        <td class="border px-4 py-2">{{ $post->tired }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">飲酒量</td>
                        <td class="border px-4 py-2">{{ $post->drink }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">酔っぱらい度合い</td>
                        <td class="border px-4 py-2">{{ $post->hangover }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">メモ</td>
                        <td class="border px-4 py-2">{{ $post->memo }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">画像</td>
                        <td class="border px-4 py-2">
                            @if ($post->image)
                                <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Post Image" class="w-32 h-32 object-cover">
                            @else
                                画像なし
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex items-center justify-start space-x-2">
            <a href="{{ route('posts.edit', $post->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                編集
            </a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    削除
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
