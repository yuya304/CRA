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
                    掲示板
                </div>
                <div class="index_body">
                    <div class="comment_item">
                        @php
                            $num = 0;
                        @endphp
                        @foreach($posts as $post)
                            <div class="comment_user">　{{$post->id}}：{{$post->name}} {{$post->created_at}}</div>
                            <div class="comment_message">　　{{$post->message}}</div>
                        @endforeach
                        <ul class="paginate">
                            <li class="paginate_item">
                                {{ $posts->links() }}
                            </li>
                        </ul>
                    </div>
                    <div class="comment_form">
                        <div class="form_title">書き込み欄</div>
                        <form method="post" action="/post_store">
                            @csrf
                            <div class="comment_name">
                                ニックネーム：<input type="text" name="post[name]"/>
                            </div>
                            <textarea class="comment_add" name="post[message]"></textarea><br>
                            <input type="submit" value="書き込む"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>