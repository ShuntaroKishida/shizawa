@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">ユーザーの詳細</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <tbody>
                    <tr class="text-left">
                        <th class="border px-4 py-2 bg-blue-300">項目</th>
                        <th class="border px-4 py-2 bg-blue-300">情報</th>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">名前</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-blue-200">メールアドレス</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex items-center justify-start space-x-2">
            <a href="{{ route('users.edit', $user->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                編集
            </a>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
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