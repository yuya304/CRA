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
            <img src="/storage/title.png"/>
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
                    ユーザ情報
                </div>
                <div class="index_body">
                    <br>
                    <div class="index_sentence">
                        学籍番号：{{$user->student_number}}
                    </div>
                    <br>
                    <div class="index_sentence">
                        名前：{{$user->name}}
                    </div>
                    <br>
                    <div class="index_sentence">
                        学年：{{$user->grade}}年
                    </div>
                    <br>
                    <div class="index_sentence">
                        入学年度：{{$user->admission}}
                    </div>
                    <br>
                    <div class="index_sentence">
                        学科・コース：{{$user->course->name}}
                    </div>
                    <br>
                    <div class="index_sentence">
                        メールアドレス：{{$user->email}}
                    </div>
                    <br>
                    <div class="cra_btn_group">
                        <a href="/edit" class="cra_btn">ユーザ情報変更</a>
                        <a href="/my_credits" class="cra_btn">履修科目確認</a>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>