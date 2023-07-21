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
                <div class="result">
                    @if($user->course_id == 1)       <!--土木工学科 社会基盤デザインコース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=5 && $credits[6]["sum"]>=11 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[7]["sum"]>=4 )
                                @php
                                    $credits[7]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 && $credits[7]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：5科目11単位<br>
                                    選択科目：4単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=17 && $credits[9]["sum"]>=38 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[11]["sum"]>=12 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[12]["count"]>=2 && $credits[12]["sum"]>=4 )
                                @php
                                    $credits[12]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[13]["count"]>=2 && $credits[13]["sum"]>=4  )
                                @php
                                    $credits[13]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $credits[12]["flag"]==1 &&
                                $credits[13]["flag"]==1 &&
                                $category_sum>=80)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目 ：3科目10単位<br>
                                    　必修科目　 ：17科目38単位<br>
                                    選択必修科目1：12単位<br>
                                    選択必修科目2：2科目4単位<br>
                                    選択必修科目3：2科目4単位<br>
                                        合計     ：80単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                    　必修科目　 ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                    選択必修科目1：{{$credits[11]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    選択必修科目2：{{$credits[12]["count"]}}科目{{$credits[12]["sum"]}}単位<br>
                                    選択必修科目3：{{$credits[13]["count"]}}科目{{$credits[13]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    126単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[7]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $credits[12]["flag"]==1 &&
                            $credits[13]["flag"]==1 &&
                            $category_sum>=80 &&
                            $all_sum>=126)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                    
                    @elseif($user->course_id == 2)   <!--土木工学科 環境デザインコース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=5 && $credits[6]["sum"]>=11 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[7]["sum"]>=4 )
                                @php
                                    $credits[7]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 && $credits[7]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：5科目11単位<br>
                                    選択科目：4単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=17 && $credits[9]["sum"]>=38 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[11]["sum"]>=12 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[12]["count"]>=2 && $credits[12]["sum"]>=4 )
                                @php
                                    $credits[12]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[13]["count"]>=2 && $credits[13]["sum"]>=4  )
                                @php
                                    $credits[13]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $credits[12]["flag"]==1 &&
                                $credits[13]["flag"]==1 &&
                                $category_sum>=80)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目 ：3科目10単位<br>
                                    　必修科目　 ：17科目38単位<br>
                                    選択必修科目1：12単位<br>
                                    選択必修科目2：2科目4単位<br>
                                    選択必修科目3：2科目4単位<br>
                                        合計     ：80単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                    　必修科目　 ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                    選択必修科目1：{{$credits[11]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    選択必修科目2：{{$credits[12]["count"]}}科目{{$credits[12]["sum"]}}単位<br>
                                    選択必修科目3：{{$credits[13]["count"]}}科目{{$credits[13]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    126単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[7]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $credits[12]["flag"]==1 &&
                            $credits[13]["flag"]==1 &&
                            $category_sum>=80 &&
                            $all_sum>=126)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                    
                    @elseif($user->course_id == 3)   <!--建築学科 建築エンジニアリングコース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=5 && $credits[6]["sum"]>=11 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[7]["sum"]>=4 )
                                @php
                                    $credits[7]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 && $credits[7]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：5科目11単位<br>
                                    選択科目：4単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=23 && $credits[9]["sum"]>=47 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[10]["count"]>=7 && $credits[10]["sum"]>=15 )
                                @php
                                    $credits[10]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[11]["count"]>=6 && $credits[11]["sum"]>=12 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[10]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $category_sum>=84)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目 ：3科目10単位<br>
                                    　必修科目1  ：23科目47単位<br>
                                    　必修科目2  ：7科目15単位<br>
                                    選択必修科目 ：6科目12単位<br>
                                        合計     ：84単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                      必修科目1  ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                      必修科目2  ：{{$credits[10]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    選択必修科目 ：{{$credits[11]["count"]}}科目{{$credits[12]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[10]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    130単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[7]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[10]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $category_sum>=84 &&
                            $all_sum>=130)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                        
                    @elseif($user->course_id == 4)   <!--建築学科 建築デザインコース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=5 && $credits[6]["sum"]>=11 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[7]["sum"]>=4 )
                                @php
                                    $credits[7]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 && $credits[7]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：5科目11単位<br>
                                    選択科目：4単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=23 && $credits[9]["sum"]>=47 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[10]["count"]>=7 && $credits[10]["sum"]>=14 )
                                @php
                                    $credits[10]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[11]["count"]>=6 && $credits[11]["sum"]>=12 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[10]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $category_sum>=83)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目 ：3科目10単位<br>
                                    　必修科目1  ：23科目47単位<br>
                                    　必修科目2  ：7科目14単位<br>
                                    選択必修科目 ：6科目12単位<br>
                                        合計     ：83単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                      必修科目1  ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                      必修科目2  ：{{$credits[10]["count"]}}科目{{$credits[10]["sum"]}}単位<br>
                                    選択必修科目 ：{{$credits[11]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[10]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    130単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[7]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[10]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $category_sum>=83 &&
                            $all_sum>=130)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                        
                    @elseif($user->course_id == 5)   <!--建築学科 アーキテクトコース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=5 && $credits[6]["sum"]>=11 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[7]["sum"]>=4 )
                                @php
                                    $credits[7]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 && $credits[7]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：5科目11単位<br>
                                    選択科目：4単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=23 && $credits[9]["sum"]>=47 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[10]["count"]>=8 && $credits[10]["sum"]>=14 )
                                @php
                                    $credits[10]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[11]["count"]>=6 && $credits[11]["sum"]>=12 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[10]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $category_sum>=83)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目 ：3科目10単位<br>
                                    　必修科目1  ：23科目47単位<br>
                                    　必修科目2  ：8科目11単位<br>
                                    選択必修科目 ：6科目12単位<br>
                                        合計     ：83単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                      必修科目1  ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                      必修科目2  ：{{$credits[10]["count"]}}科目{{$credits[10]["sum"]}}単位<br>
                                    選択必修科目 ：{{$credits[11]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[10]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    130単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[7]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[10]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $category_sum>=83 &&
                            $all_sum>=130)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                        
                    @elseif($user->course_id == 6)   <!--機械工学科-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=8 && $credits[6]["sum"]>=17 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：8科目17単位<br>
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=17 && $credits[9]["sum"]>=42 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $category_sum>=80)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目 ：3科目10単位<br>
                                    　必修科目   ：17科目42単位<br>
                                        合計     ：80単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                      必修科目   ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[10]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    126単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $category_sum>=80 &&
                            $all_sum>=126)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                        
                    @elseif($user->course_id == 7)   <!--電気電子工学科 電子情報通信コース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=7 && $credits[6]["sum"]>=15 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[7]["sum"]>=6 )
                                @php
                                    $credits[7]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 && $credits[7]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：7科目15単位<br>
                                    選択科目：6単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=13 && $credits[9]["sum"]>=26 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[11]["sum"]>=24 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $category_sum>=70)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目：3科目10単位<br>
                                    　必修科目  ：13科目26単位<br>
                                    選択必修科目：24単位<br>
                                        合計    ：70単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                      必修科目   ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                    選択必修科目 ：{{$credits[11]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[10]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    125単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[7]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $category_sum>=70 &&
                            $all_sum>=125)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                        
                    @elseif($user->course_id == 8)   <!--電気電子工学科 電気エネルギーコース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=7 && $credits[6]["sum"]>=15 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[7]["sum"]>=6 )
                                @php
                                    $credits[7]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 && $credits[7]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：7科目15単位<br>
                                    選択科目：6単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=13 && $credits[9]["sum"]>=26 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[11]["sum"]>=24 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $category_sum>=70)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目：3科目10単位<br>
                                    　必修科目  ：13科目26単位<br>
                                    選択必修科目：24単位<br>
                                        合計    ：70単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                      必修科目   ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                    選択必修科目 ：{{$credits[11]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[10]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    125単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[7]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $category_sum>=70 &&
                            $all_sum>=125)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                        
                    @elseif($user->course_id == 9)   <!--生命応用化学科-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=7 && $credits[6]["sum"]>=15 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[7]["sum"]>=4 )
                                @php
                                    $credits[7]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[6]["flag"]==1 && $credits[7]["flag"]==1 )
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：7科目15単位<br>
                                    選択科目：4単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=16 && $credits[9]["sum"]>=32 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $category_sum>=80)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目：3科目10単位<br>
                                    　必修科目  ：16科目32単位<br>
                                        合計    ：80単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                      必修科目   ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[10]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    126単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[7]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $category_sum>=80 &&
                            $all_sum>=126)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                        
                    @elseif($user->course_id == 10)  <!--情報工学科 情報システムコース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=10 && $credits[6]["sum"]>=21 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：10科目21単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選択科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=13 && $credits[9]["sum"]>=32 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if( $credits[11]["sum"]>=3 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if( $credits[12]["sum"]>=1 )
                                @php
                                    $credits[12]["flag"] = 1;
                                @endphp
                            @endif
                            @if( $credits[13]["sum"]>=25 )
                                @php
                                    $credits[13]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $credits[12]["flag"]==1 &&
                                $credits[13]["flag"]==1 &&
                                $category_sum>=74)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目 ：3科目10単位<br>
                                    　必修科目　 ：13科目32単位<br>
                                    選択必修科目1：3単位<br>
                                    選択必修科目2：1単位<br>
                                    選択必修科目3：25単位<br>
                                        合計     ：74単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                    　必修科目　 ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                    選択必修科目1：{{$credits[11]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    選択必修科目2：{{$credits[12]["count"]}}科目{{$credits[12]["sum"]}}単位<br>
                                    選択必修科目3：{{$credits[13]["count"]}}科目{{$credits[13]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    128単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $credits[12]["flag"]==1 &&
                            $credits[13]["flag"]==1 &&
                            $category_sum>=74 &&
                            $all_sum>=128)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                        
                    @elseif($user->course_id == 11)  <!--情報工学科 情報デザインコース-->
                        <table border=1>
                            <tr>
                                <th> </th>
                                <th>条件</th>
                                <th>あなた</th>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[0]["count"]>=2 && $credits[0]["sum"]>=4 )
                                @php
                                    $credits[0]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[1]["count"]>=4 && $credits[1]["sum"]>=8)
                                @php
                                    $credits[1]["flag"] = 1;
                                @endphp
                            @endif
                            
                            @if($credits[0]["flag"]==1 && $credits[1]["flag"]==1)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    教養科目
                                </td>
                                <td>
                                    必修科目：2科目4単位<br>
                                    選択科目：4科目8単位
                                </td>
                                <td>
                                    必修科目：{{$credits[0]["count"]}}科目{{$credits[0]["sum"]}}単位<br>
                                    選択科目：{{$credits[1]["count"]}}科目{{$credits[1]["sum"]}}単位
                                    
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[2]["count"]>=10 && $credits[2]["sum"]>=10 )
                                @php
                                    $credits[2]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    外国語科目
                                </td>
                                <td>
                                    必修科目：10科目10単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[2]["count"]}}科目{{$credits[2]["sum"]}}単位<br>
                                    選択科目：{{$credits[3]["count"]}}科目{{$credits[3]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[4]["count"]>=2 && $credits[4]["sum"]>=2 )
                                @php
                                    $credits[4]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    体育科目
                                </td>
                                <td>
                                    必修科目：2科目2単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[4]["count"]}}科目{{$credits[4]["sum"]}}単位<br>
                                    選択科目：{{$credits[5]["count"]}}科目{{$credits[5]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[6]["count"]>=10 && $credits[6]["sum"]>=21 )
                                @php
                                    $credits[6]["flag"] = 1;
                                @endphp
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                
                                <td class=category_name>
                                    自然科学科目
                                </td>
                                <td>
                                    必修科目：10科目21単位<br>
                                    選択科目：0科目0単位
                                </td>
                                <td>
                                    必修科目：{{$credits[6]["count"]}}科目{{$credits[6]["sum"]}}単位<br>
                                    選��科目：{{$credits[7]["count"]}}科目{{$credits[7]["sum"]}}単位
                                </td>
                            </tr>
                            <!--条件クリア判定-->
                            @if($credits[8]["count"]>=3 && $credits[8]["sum"]>=10 )
                                @php
                                    $credits[8]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[9]["count"]>=13 && $credits[9]["sum"]>=32 )
                                @php
                                    $credits[9]["flag"] = 1;
                                @endphp
                            @endif
                            @if( $credits[11]["sum"]>=3 )
                                @php
                                    $credits[11]["flag"] = 1;
                                @endphp
                            @endif
                            @if( $credits[12]["sum"]>=1 )
                                @php
                                    $credits[12]["flag"] = 1;
                                @endphp
                            @endif
                            @if( $credits[13]["sum"]>=25 )
                                @php
                                    $credits[13]["flag"] = 1;
                                @endphp
                            @endif
                            @if($credits[8]["flag"]==1 &&
                                $credits[9]["flag"]==1 &&
                                $credits[11]["flag"]==1 &&
                                $credits[12]["flag"]==1 &&
                                $credits[13]["flag"]==1 &&
                                $category_sum>=74)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    専門教育科目
                                </td>
                                <td>
                                    専門共通科目 ：3科目10単位<br>
                                    　必修科目　 ：13科目32単位<br>
                                    選択必修科目1：3単位<br>
                                    選択必修科目2：1単位<br>
                                    選択必修科目3：25単位<br>
                                        合計     ：74単位
                                </td>
                                <td>
                                    専門共通科目 ：{{$credits[8]["count"]}}科目{{$credits[8]["sum"]}}単位<br>
                                    　必修科目　 ：{{$credits[9]["count"]}}科目{{$credits[9]["sum"]}}単位<br>
                                    選択必修科目1：{{$credits[11]["count"]}}科目{{$credits[11]["sum"]}}単位<br>
                                    選択必修科目2：{{$credits[12]["count"]}}科目{{$credits[12]["sum"]}}単位<br>
                                    選択必修科目3：{{$credits[13]["count"]}}科目{{$credits[13]["sum"]}}単位<br>
                                    　選択科目　 ：{{$credits[14]["count"]}}科目{{$credits[14]["sum"]}}単位<br>
                                    　　合計　　 ：{{$credits[8]["count"]+$credits[9]["count"]+$credits[11]["count"]+$credits[12]["count"]+$credits[13]["count"]+$credits[14]["count"]}}科目
                                                    {{$category_sum}}単位
                                </td>
                            </tr>
                            @if($all_sum)
                                <tr class="result_item_ok">
                            @else
                                <tr class="result_item_ng">
                            @endif
                                <td class=category_name>
                                    合計
                                </td>
                                <td>
                                    128単位
                                </td>
                                <td>
                                    {{$all_sum}}単位
                                </td>
                            </tr>
                        </table>
                        @if($credits[0]["flag"]==1 && 
                            $credits[1]["flag"]==1 &&
                            $credits[2]["flag"]==1 &&
                            $credits[4]["flag"]==1 &&
                            $credits[6]["flag"]==1 &&
                            $credits[8]["flag"]==1 &&
                            $credits[9]["flag"]==1 &&
                            $credits[11]["flag"]==1 &&
                            $credits[12]["flag"]==1 &&
                            $credits[13]["flag"]==1 &&
                            $category_sum>=74 &&
                            $all_sum>=128)
                            <div class="graduation">卒業条件を満たしました！</div>
                        @else
                            <div class="graduation">卒業条件を満たしていません</div>
                        @endif
                    @endif
                    
                    <div>
                        本登録完了しました<br>
                        左のメニューから他の機能を選択してください
                    </div>
                    <div class="review_request">
                        ※お願い※<br>
                        マイページの履修科目確認から<br>
                        レビューをお願いします！
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>