<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>日大工学部履修登録補助</title>
        <!-- Fonts -->
        <link href="{{secure_asset('css/style.css')}}" rel="stylesheet" >
    </head>
    <body>
        <div class="header">
            <img src="/title.png"/>
        </div>
        <div class="content">
            <div class="menu">
                <ul>
                <li><a href="/">ページ案内</a></li>
                <li><a href="/my_page">マイページ</a></li>
                <li><a href="/registration">履修登録</a></li>
                <li><a href="/subject">授業レビュー</a></li>
                <li><a href="/post">全体掲示板</a></li>
                <li><a href="/logout_check">ログアウト</a></li>
                </ul> 
            </div>
        
            <div class="common_body">
                <div class="common_title">
                    ユーザ情報変更
                </div>
                <div class="index_body">
                    <x-app-layout>
                        @include('profile.partials.update-profile-information-form')
                        <br>
                        @include('profile.partials.update-password-form')
                        <br>
                    </x-app-layout>
                    
                    <a href="/my_page" class="cra_btn">戻る</a>
                    <br>
                </div>
            </div>
        </div>
        
    </body>
</html>
