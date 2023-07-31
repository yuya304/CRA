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
                    履修単位一覧
                </div>
                <div class="course_name">
                    {{$user->course->name}}
                </div>
                <form method="post" action="/registration_delete">
                    @csrf
                    <div class="tab-wrap">
                        @foreach ($categories as $category)
                            <input id="TAB-{{$category->id}}" type="radio" name="TAB" class="tab-switch" checked="checked"/>
                            <label class="tab-label" for="TAB-{{$category->id}}">{{$category->name}}</label>
                            <div class="tab-content">
                                <table border=1>
                                    <tr>
                                        <th class = "subject">科目名</th>
                                        <th class = "credit">単位数</th>
                                        <th class = "attribute">選択・必修</th>
                                        <th class = "definitive">履修登録</th>
                                        <th class = "review">レビュー</th>
                                        <th class = "delete">削除</th>
                                    </tr>
                                    @foreach ($registrations as $registration)
                                        @if($registration->subject->category_id === $category->id)
                                            @foreach ($course_categories as $course_category)
                                                @if($registration->subject_id === $course_category->subject_id)
                                                    <tr>
                                                        <td class = "subject"><a href="/review/{{$registration->subject_id}}">{{ $registration->subject->name }}</a></td>
                                                        <td class = "credit">{{ $registration->subject->credit }}</td>
                                                        <td class = "attribute">{{ $course_category->attribute->name }}</td>
                                                        <td class = "definitive">
                                                            @if($registration->is_definitive == false)
                                                                履修中
                                                            @elseif($registration->is_definitive == true)
                                                                履修済
                                                            @endif
                                                        </td>
                                                        <td class = "review">
                                                            @if($registration->is_reviewed == false)
                                                                未
                                                            @elseif($registration->is_reviewed == true)
                                                                済
                                                            @endif
                                                        </td>
                                                        <td class = "delete"><button type="submit" name = "subject" value="{{$registration->subject_id}}">削除</button></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        @endforeach
                    </div>
                </form>
                <div class=mycredit_massage> 
                    ※レビューがまだの場合は科目名をクリックしてレビューを実施してください。
                </div>
                <br>
                <a href="/graduation_check" class="cra_btn">卒業条件確認</a>
                <a href="/my_page" class="cra_btn">マイページ</a>
            </div>
        </div>
        
    </body>
</html>