<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="/css/styles-mini.css" rel="stylesheet" type="text/css">
    <script src="/js/render.js"></script>
    <title>Search - {{ app('request')->input('search') }}</title>
</head>
<body>

<div class="viewport">
    <!-- TOP MENU -->
    <div id="gb2" class="gbes2">
        <div id="gb" class="gbes">


            <div id="buscador-top">
                <a href="Buscador-motor.html"><div id="doodle-small"></div></a>
                <form  action="">
                    <input type="text" required name="search" class="tftextinput-results" value="{{ app('request')->input('search') }}">
                    <input  type="submit"  class="tfbutton" value="Search">
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="search-result-count">
            <p>Approximately 350.000.000 searches (0.31 seconds)</p>
        </div>
@for($i = 0; $i < sizeof($res); $i++)
        <div class="search-result-item">
            <div class="search-result-item-link">
                <p>
                    <a href="{{$res[$i]['link']}}"><strong>{{$res[$i]["title"]}}</strong>
                </p>
            </div>
            <div class="search-result-item-url">
                <a href="{{$res[$i]["displayLink"]}}">{{$res[$i]["displayLink"]}}</a>
            </div>
            <p class="search-result-item-description">{!! $res[$i]["snippet"]!!}....</p>

        </div>
        @endfor
        <div>
            <ul class="pagination">
                <li><a href="/search?search={{ app('request')->input('search') }}&page=1">&laquo;</a></li>
                @for($i = 1; $i < 11; $i++)
                @if($page == $i)
                <li><a href="/search?search={{ app('request')->input('search') }}&page={{$i}}"><b>{{$i}}</b></a></li>
                @else
                    <li><a href="/search?search={{ app('request')->input('search') }}&page={{$i}}">{{$i}}</a></li>
                @endif
                @endfor
                <li><a href="/search?search={{ app('request')->input('search') }}&page=10">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
