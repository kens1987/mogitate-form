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
                <div class="product-image">
                    <img src="{{ asset('storage/images/'.$product->image) }}" alt="{{ $product->name }}">
                    <input value="{{ $product->image }}">
                </div>
                <div class="product-detail-form">
                    <label>商品名</label>
                    <input type="text" value="{{ $product->name }}" readonly>
                    <label>価格</label>
                    <input type="text" value="{{ $product->price }}" readonly>
                    <label>季節</label>
                    <div class="season-options">
                        @foreach(['春','夏','秋','冬'] as $season)
                        <label>
                            <input type="radio" disabled {{ $product->seasons->contains('season',$season) ?'checked':'' }}>
                            {{ $season }}
                        </label>
                        @endforeach
                    </div>
                    <label>商品説明</label>
                    <textarea readonly>{{ $product->description }}</textarea>
                    <div class="product-detail-actions">
                        <a href="{{ route('products.destroy',$product->id) }}" class="btn-update">変更を保存</a>
                        <form action="{{ route('products.destroy',$product->id) }}" method="post" onsubmit="return confirm('削除しますか？')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete">🗑</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
