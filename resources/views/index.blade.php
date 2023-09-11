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
                    ページ案内
                </div>
                <div class="index_body">
                    <div class="index_item">
                        マイページ
                    </div>
                    <div class="index_sentence">
                        ユーザ情報が確認できます。
                    </div>
                    <div class="index_sentence">
                        履修科目確認から履修科目を選択することで授業のレビューが出来ます。
                    </div>
                    <div class="index_item">
                        履修登録
                    </div>
                    <div class="index_sentence">
                        履修登録をして取得単位数計算と卒業条件をクリアしているかの確認ができます。
                    </div>
                    <div class="index_sentence">
                        仮登録と本登録があり、履修中の場合は仮登録、単位を取得した場合は本登録をしてください。
                    </div>
                    <div class="index_item">
                        授業レビュー
                    </div>
                    <div class="index_sentence">
                        科目に対しての他ユーザーからのレビュー結果を閲覧できます。
                    </div>
                    <div class="index_sentence">
                        科目ごとの掲示板があります。
                    </div>
                    <div class="index_item">
                        全体掲示板
                    </div>
                    <div class="index_sentence">
                        掲示板機能です。
                    </div>
                    <div class="index_sentence">
                        他ユーザーとの交流が出来ます。
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>