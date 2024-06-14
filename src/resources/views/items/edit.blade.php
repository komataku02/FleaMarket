@extends('layouts.app')

@section('content')
<div class="container">
  <h1>商品情報の編集</h1>

  <form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="name">商品名</label>
      <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
    </div>

    <div class="form-group">
      <label for="description">商品説明</label>
      <textarea name="description" class="form-control" rows="3" required>{{ $item->description }}</textarea>
    </div>

    <div class="form-group">
      <label for="price">価格</label>
      <input type="number" name="price" class="form-control" value="{{ $item->price }}" required>
    </div>

    <div class="form-group">
      <label for="category1">カテゴリー1 (必須)</label>
      <select name="categories[]" class="form-control" required>
        <option value="">選択してください</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" >{{ $category->category }}</option>
        @endforeach
      </select>
      @error('categories.0')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="category2">カテゴリー2 (任意)</label>
      <select name="categories[]" class="form-control">
        <option value="">選択してください</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" >{{ $category->category }}</option>
        @endforeach
      </select>
      @error('categories.1')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="category3">カテゴリー3 (任意)</label>
      <select name="categories[]" class="form-control">
        <option value="">選択してください</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category }}</option>
        @endforeach
      </select>
      @error('categories.2')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>


    <div class="form-group">
      <label for="condition">商品の状態</label>
      <input type="text" name="condition" class="form-control" value="{{ $item->condition }}" required>
    </div>

    <button type="submit" class="btn btn-primary">更新する</button>
  </form>
</div>
@endsection