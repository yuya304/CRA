<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>日大工学部履修登録補助</title>
        <!-- Fonts -->
        <link href="{{secure_asset('/build/assets/css/style.css')}}" rel="stylesheet" >
    </head>
    <body>
        <div class="header">
            <div class="header_title">
                日大工学部履修登録補助サイト
            </div>
        </div>
        <div class="content">
            <div class="menu">
                <ul>
                <li><a href="/index">ページ案内</a></li>
                <li><a href="/mypage">マイページ</a></li>
                <li><a href="/registration">履修登録</a></li>
                <li><a href="#">授業レビュー</a></li>
                <li><a href="#">全体掲示板</a></li>
                <li><a href="#">ログアウト</a></li>
                </ul> 
            </div>
        
            <div class="common_body">
                <div class="common_title">
                    ログアウト
                </div>
                <div class="index_body">
                    <div class="index_item">
                        ログアウトしますか？
                    </div>
                    <div class="btn_flex">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout_btn" href="route('logout')" >はい</button>
                    </form>
                    <button href="/index" class="logout_btn">いいえ</a>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>