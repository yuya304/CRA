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
                <li><a href="#">マイページ</a></li>
                <li><a href="/registration">履修登録</a></li>
                <li><a href="#">授業レビュー</a></li>
                <li><a href="#">全体掲示板</a></li>
                <li><a href="#">ログアウト</a></li>
                </ul> 
            </div>
        
            <div class="common_body">
                <div class="common_title">
                    履修登録（本登録）
                </div>
                <div class="course_name">
                    {{$user->course->name}}
                </div>
                <form method="post" action="/definitive_store">
                    @csrf
                    <div class="tab-wrap">
                        @foreach ($categories as $category)
                            <input id="TAB-{{$category->id}}" type="radio" name="TAB" class="tab-switch" checked="checked"/>
                            <label class="tab-label" for="TAB-{{$category->id}}">{{$category->name}}</label>
                            <div class="tab-content">
                                <table border=1>
                                    <tr>
                                        <th>　</th>
                                        <th class = "category">科目名</th>
                                        <th class = "credit">単位数</th>
                                        <th class = "attribute">選択・必修</th>
                                    </tr>
                                    @foreach ($registrations as $registration)
                                        @if($registration->subject->category_id === $category->id)
                                            @foreach ($course_categories as $course_category)
                                                @if($registration->subject_id === $course_category->subject_id)
                                                    <tr>
                                                        <td class = check_box><input type="checkbox" name="subjects[]" value="{{$registration->subject_id}}"></td>
                                                        <td class = "category">{{ $registration->subject->name }}</td>
                                                        <td class = "credit">{{ $registration->subject->credit }}</td>
                                                        <td class = "attribute">{{ $course_category->attribute->name }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        @endforeach
                    </div>
                    <input type="submit" value="登録">
                </form>
            </div>
        </div>
        
    </body>
</html>