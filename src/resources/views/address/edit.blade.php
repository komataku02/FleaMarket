@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <h3>配送先の変更</h3>
  <form action="{{ route('address.update') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="postal_code">郵便番号</label>
      <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ old('postal_code', session('address.postal_code')) }}">
    </div>

    <div class="form-group">
      <label for="address">住所</label>
      <input type="text" name="address" id="address" class="form-control" value="{{ old('address', session('address.address')) }}">
    </div>

    <div class="form-group">
      <label for="building_name">建物名</label>
      <input type="text" name="building_name" id="building_name" class="form-control" value="{{ old('building_name', session('address.building_name')) }}">
    </div>

    <button type="submit" class="btn btn-primary">更新</button>
  </form>
</div>
@endsection