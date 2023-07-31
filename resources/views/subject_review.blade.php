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
                    授業レビュー
                </div>
                <div class="review_subject_name">{{$course_category->subject->name}}</div>
                <div class="index_body">
                    <table border=1>
                        <tr>
                            <td class ="review_subject_credit">単位数：{{$course_category->subject->credit}}</td>
                            <td class ="review_subject_attribute">{{$course_category->attribute->name}}</td>
                        </tr>
                    </table>
                    <table border=1>
                        <tr>
                            <th class="review_title">授業難易度<br>
                            （テスト・レポートなど）</th>
                            <th class="review_title">授業の分かりやすさ</th>
                            <th class="review_title">ためになったか</th>
                        </tr>
                        <tr>
                            <td class="review_result">{{$level}}</td>
                            <td class="review_result">{{$understandability}}</td>
                            <td class="review_result">{{$benefit}}</td>
                        </tr>
                    </table>
                    <div class="comment_title">コメント</div>
                    <div class="comment_item">
                        @php
                            $num = 0;
                        @endphp
                        @foreach($subject_posts as $subject_post)
                            @php
                                $num++;
                            @endphp
                            <div class="comment_user">　{{$num}}：{{$subject_post->name}} {{$subject_post->created_at}}</div>
                            <div class="comment_message">　　{{$subject_post->message}}</div>
                        @endforeach
                        <ul class="paginate">
                            <li class="paginate_item">
                                {{ $subject_posts->links() }}
                            </li>
                        </ul>
                    </div>
                    <div class="comment_form">
                        <div class="form_title">書き込み欄</div>
                        <form method="post" action="/review_comment_store">
                            @csrf
                            <div class="comment_name">
                                ニックネーム：<input type="text" name="post[name]"/>
                            </div>
                            <textarea class="comment_add" name="post[message]"></textarea><br>
                            <input type="hidden" name="post[subject_id]" value="{{$course_category->subject_id}}">
                            <input type="submit" value="書き込む"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>