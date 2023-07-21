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
                    ユーザ情報
                </div>
                <div class="index_body">
                    <br>
                    <div class="index_sentence">
                        学籍番号：{{$user->student_id}}
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
                        入学年度：{{$user->addmission}}
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
                    <a href="/my_credits" class="my_page_btn">履修科目確認</a>
                </div>
            </div>
        </div>
        
    </body>
</html>