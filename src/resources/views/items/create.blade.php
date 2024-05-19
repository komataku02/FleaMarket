@extends('layouts.app')

@section('content')
<div class="container">
  <h1>商品の出品</h1>

  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">商品名</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}">
      @error('name')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="description">商品の説明</label>
      <textarea name="description" class="form-control">{{ old('description') }}</textarea>
      @error('description')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="price">販売価格</label>
      <input type="text" name="price" class="form-control" value="{{ old('price') }}">
      @error('price')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="category">カテゴリー</label>
      <select name="category[]" class="form-control" >
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category }}</option>
        @endforeach
      </select>
      @error('category')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="condition">商品の状態</label>
      <select name="condition" class="form-control">
        @foreach(['新品・未使用', '未使用に近い', '目立った傷や汚れなし', 'やや傷や汚れあり', '傷や汚れあり', '全体的に状態が悪い'] as $condition)
        <option value="{{ $condition }}">{{ $condition }}</option>
        @endforeach
      </select>
      @error('condition')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="image">商品画像</label>
      <input type="file" name="image" class="form-control">
      @error('image')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">出品</button>
  </form>
</div>
@endsection