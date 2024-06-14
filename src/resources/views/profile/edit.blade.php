@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">ユーザー名</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
    </div>

    <div class="form-group">
      <label for="postal_code">郵便番号</label>
      <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ old('postal_code', optional($user->profile)->postal_code) }}">
    </div>

    <div class="form-group">
      <label for="address">住所</label>
      <input type="text" name="address" id="address" class="form-control" value="{{ old('address', optional($user->profile)->address) }}">
    </div>

    <div class="form-group">
      <label for="building_name">建物名</label>
      <input type="text" name="building_name" id="building_name" class="form-control" value="{{ old('building_name', optional($user->profile)->building_name) }}">
    </div>

    <div class="form-group">
      <label for="profile_image">プロフィール画像</label>
      <input type="file" name="profile_image" id="profile_image" class="form-control">
      @if (optional($user->profile)->profile_image_path)
      <img src="{{ Storage::url($user->profile->profile_image_path) }}" alt="プロフィール画像" class="mt-2" width="100">
      <button type="button" class="btn btn-danger mt-2" onclick="document.getElementById('delete-profile-image').submit();">画像を削除</button>
      @endif
    </div>

    <button type="submit" class="btn btn-primary">更新</button>
  </form>

  <form id="delete-profile-image" action="{{ route('profile.deleteImage') }}" method="POST" style="display: none;">
    @csrf
  </form>
</div>
@endsection