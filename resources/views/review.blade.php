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
                    レビュー
                </div>
                <div class="review_subject_name">{{$subject->name}}</div>
                <div class="index_body">
                    <form method="post" action="/review_store">
                        @csrf
                        <table border=1>
                            <tr>
                                <td class="review_title">授業難易度(テスト・レポートなど)</td>
                                <td class="review_item">簡単</td>
                                <td><input type="radio" name="level" value="1">
                                    <input type="radio" name="level" value="2">
                                    <input type="radio" name="level" value="3" checked>
                                    <input type="radio" name="level" value="4">
                                    <input type="radio" name="level" value="5">
                                </td>
                                <td class="review_item">難しい</td>
                            </tr>
                            <tr>
                                <td class="review_title">授業の分かりやすさ</td>
                                <td class="review_item">分かりやすい</td>
                                <td><input type="radio" name="understandability" value="1">
                                    <input type="radio" name="understandability" value="2">
                                    <input type="radio" name="understandability" value="3" checked>
                                    <input type="radio" name="understandability" value="4">
                                    <input type="radio" name="understandability" value="5">
                                </td>
                                <td class="review_item">分かりずらい</td>
                            </tr>
                            <tr>
                                <td class="review_title">ためになったか</td>
                                <td class="review_item">なった</td>
                                <td><input type="radio" name="benefit" value="1">
                                    <input type="radio" name="benefit" value="2">
                                    <input type="radio" name="benefit" value="3" checked>
                                    <input type="radio" name="benefit" value="4">
                                    <input type="radio" name="benefit" value="5">
                                </td>
                                <td class="review_item">ならなかった</td>
                            </tr>
                        </table>
                        <br>
                        <input type="hidden" name="subject" value="{{$subject->id}}">
                        <input type="submit"value="登録">
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>