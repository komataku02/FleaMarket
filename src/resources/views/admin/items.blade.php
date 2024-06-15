@extends('layouts.app')

@section('content')
<div class="container">
  <a class="back-btn" href="{{ route('admin.index') }}">
    back</a>
  <h1>商品管理</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>商品名</th>
        <th>価格</th>
        <th>作成日</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection