<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
      <header class="header">
    <h3 class="header-logo">mogitate</h3>
  </header>

  <main class="main-grid">
    <aside class="sidebar">
      <h2 class="product-title">商品一覧</h2>
      @if(!empty($keyword) || ($sort))
        <div class="search-tags" style="margin-bottom: 10px;">
          @if(!empty($keyword))
            <span class="tag">"「{{ $keyword }}」"の商品一覧</span>
          @endif
          @if($sort === 'high')
            <span class="tag">高い順に表示</span>
          @elseif($sort === 'low')
            <span class="tag">低い順に表示</span>
          @endif
        </div>
      @endif
      <form action="/products/search" method="get">
        @csrf
        <div class="product-group">
          <div class="product-search">
            <input type="text" name="name" placeholder="商品名で検索" value="{{ old('name',$keyword??'') }}" >
            <button type="submit">検索</button>
          </div>
          <div class="product-choice">
            <span>価格順で表示</span>
            <select name="sort">
              <option value="">--価格で並び替え--</option>
              <option value="high"{{ request('sort') === 'high'?'selected':'' }}>高い順に表示</option>
              <option value="low"{{ request('sort') === 'low'?'selected':'' }}>低い順に表示</option>
            </select>
            @if(!empty($sort))
            <button type="submit" name="sort" value="" class="reset-btn" title="">×</button>
            @endif
          </div>
        </div>
      </form>
    </aside>

    <section class="product-list">
      <a href="" target="_blank" class="product-addition">+ 商品を追加</a>

      <div class="product-grid">
        @foreach ($products as $product)
        <a href="{{ route('products.show',['product' => $product->id]) }}">
          <div class="product-card">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" />
            <div class="product-info">
              <p>{{ $product->name }}</p>
              <p>¥{{ number_format($product->price) }}</p>
            </div>
          </div>
        </a>
        @endforeach

      <div class="pagination">
        {{ $products->links() }}
      </div>
    </section>
  </main>
</body>
</html>
