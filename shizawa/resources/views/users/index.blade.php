@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center">
        <h1 class="text-xl font-bold my-4">ユーザー一覧</h1>
        <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            新規ユーザー作成
        </a>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <table class="text-left w-full border-collapse">
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light bg-blue-300">名前</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light bg-blue-300">メールアドレス</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">
                        <a href="" class="text-blue-500 hover:text-blue-800 font-bold">{{ $user->name }}</a>
                    </td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection