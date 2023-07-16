<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ファイルインポート</title>
        <!-- Fonts -->
        <link href="{{secure_asset('/build/assets/css/style.css')}}" rel="stylesheet">
    </head>
    <body>
        <p>subjects</p>
        <form action="{{ route('postSubject') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="subjectFile">
            <button>Submit</button>
        </form>
        <p>course_categries</p>
        <form action="{{ route('postCourse') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="courseFile">
            <button>Submit</button>
        </form>
    </body>
</html>