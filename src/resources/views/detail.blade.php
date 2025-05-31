<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
</head>
<body>
    <header class="header">
        <h3 class="header-logo">mogitate</h3>
    </header>
    <main>
        <div class="product-detail-container">
            <a href="{{ route('product.index') }}" class="back-link">商品一覧</a>
        <div class="product-detail-content">
            <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="product-image">
                    <img src="{{ asset('storage/images/'.$product->image) }}" alt="{{ $product->name }}">
                    <input type="file" name="image">
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <p>{{ $product->image }}</p>
                </div>
                <div class="product-detail-form">
                    <label>商品名</label>
                    <input type="text" name="name" value="{{ old('name',$product->name) }}">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <label>価格</label>
                    <input type="text" name="price" value="{{ old('price',$product->price) }}">
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <label>季節</label>
                    <div class="season-options">
                        @foreach(['春','夏','秋','冬'] as $season)
                            <label>
                                <input type="checkbox" name="seasons[]" value="{{ $season }}" {{ $product->seasons->contains('name',$season) ?'checked':'' }}>
                                {{ $season }}
                            </label>
                        @endforeach
                    </div>
                    @error('seasons')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <label>商品説明</label>
                    <textarea name="description">{{ old('description',$product->description) }}</textarea>
                    @error('description')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="product-detail-actions" style="display:flex; gap:10px;">
                        <button type="submit" class="btn-update">変更を保存</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('product.index') }}" class="btn-back">← 戻る</a>
            <form action="{{ route('products.destroy',$product->id) }}" method="post" onsubmit="return confirm('削除しますか？')">
                @csrf
                @method('delete')
                    <button type="submit" class="btn-delete">🗑</button>
            </form>
        </div>
    </div>
    </main>
</body>
