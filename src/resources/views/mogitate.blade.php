<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

</head>
<body>
    <header class="header">
        <h3 class="header-logo">mogitate</h3>
    </header>
    <main>
        <form class="form" action="">
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <span>商品名</span>
                    <span>必須</span>
                </div>
                <div class="register-form__group-content">
                    <div class="register-form__input-text">
                        <input type="text" name="name" placeholder="商品名を入力">
                    </div>
                </div>
                <div class="register-form__group-title">
                    <span>値段</span>
                    <span>必須</span>
                </div>
                <div class="register-form__group-content">
                    <div class="register-form__input-text">
                        <input type="text" name="name" placeholder="値段を入力">
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>