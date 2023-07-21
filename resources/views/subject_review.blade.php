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
            <div class="width:1000">
                <img src="/storage/title.png"/>
            </div>
        </div>
        <div class="content">
            <div class="menu">
                <ul>
                <li><a href="/index">ページ案内</a></li>
                <li><a href="/my_page">マイページ</a></li>
                <li><a href="/registration">履修登録</a></li>
                <li><a href="/subject">授業レビュー</a></li>
                <li><a href="#">全体掲示板</a></li>
                <li><a href="/logout_check">ログアウト</a></li>
                </ul> 
            </div>
        
            <div class="common_body">
                <div class="common_title">
                    授業レビュー
                </div>
                <div class="review_subject">{{$course_category->subject->name}}</div>
                <div class="index_body">
                    <table border=1>
                        <tr>
                            <td>単位数：{{$course_category->subject->credit}}</td>
                            <td>{{$course_category->attribute->name}}</td>
                        </tr>
                    </table>
                    <table border=1>
                        <tr>
                            <th>授業難易度<br>
                            （テスト・レポートなど）</th>
                            <th>授業の分かりやすさ</th>
                            <th>ためになったか</th>
                        </tr>
                        <tr>
                            <td>{{$level}}</td>
                            <td>{{$understandability}}</td>
                            <td>{{$benefit}}</td>
                        </tr>
                    </table>
                    <div class="comment_title">コメント</div>
                    
                </div>
            </div>
        </div>
        
    </body>
</html>