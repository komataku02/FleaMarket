@extends('layouts.app')

@section('content')
<div class="container">
  <h1>メール送信</h1>
  <form action="{{ route('admin.sendEmail') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="user_id">ユーザーID</label>
      <input type="text" id="user_id" name="user_id" class="form-control" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">メール送信</button>
    </div>
  </form>
</div>
@endsection