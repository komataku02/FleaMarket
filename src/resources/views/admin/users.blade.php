@extends('layouts.app')

@section('content')
<div class="container">
  <a class="back-btn" href="{{ route('admin.index') }}">
    back</a>
  <h1>ユーザー管理</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>メール</th>
        <th>作成日</th>
        <th>管理者権限</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>
          @if ($user->is_admin)
          @if ($user->id !== auth()->user()->id)
          {{-- 管理者権限削除フォーム --}}
          <form action="{{ route('admin.revokeAdmin', $user->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">管理者権限削除</button>
          </form>
          @else
          {{-- 自分自身の場合は何も表示しない --}}
          @endif
          @else
          {{-- 管理者権限付与フォーム --}}
          <form action="{{ route('admin.grantAdmin', $user->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">管理者権限付与</button>
          </form>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection