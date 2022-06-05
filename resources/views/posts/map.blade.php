@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/map.css">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <div class="circle">
        	<div class="cquarter-circle-4"></div>
        	<div class="semicircle-bottom"></div>
        	<div class="semicircle-bottom"></div>
        	<div class="semicircle-bottom"></div>
        	<div class="semicircle-bottom"></div>
        	<div class="semicircle-bottom"></div>
        	<div class="cquarter-circle-3"></div>
    	</div>
    	
        <div class='body'>
            <div class='title'>
                <h1>傘に７００円も払ってたまるか</h1>
            </div>
            <div id='container'>
                <div id="map"></div>
            </div>
            <div class='explanation'>
                <p>傘マークの基準は以下の通りです。</p>
                <p><image src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABB1JREFUWEftl1toHUUYx/8zs5fsnvS0JkLQ9KS2sV6SaBspKOh7BUUQmnJKmsSEgBR86ZMPPgl9FvFRvPVGQxvwrfjgBeyThNKkMQm2tprTVNmKISbnnD1n98x8MrOpaJI2qSeBfeg87c7OfPOb/3++2RmGlBeWcj48BKzXoYcKpkbBEbR9lUfh1XqBVvbfNIvPYlfQi9mWVAAW3K72S9XFF7YJwZqEg+2Cs+kw/Hiv571NYOp2FAIQ6Gpwf9pTmpqoB/qBFLzmP/vajWr1zZ2280xI9PKdWox214fLGS6XltDtZ0GMYbK0iPYGH1lhTU6FS2PPe41RW/Hqsf8DuiHAX7zO438q+Y4iND9q29sZU5gohXjO92EzHYKhEEVoc2zDUFESEhwuYyBGsBmn6XJx7inXfX9PeebTBwG9L+BsY3cHo9rBQhx98Jht6YFQI8JcVDUwjDEwCDPefBxih+2AgUPXEhQiReCMw2YaOnm3hXXNF/z13OL49Y2A3hOwkO3OE8lzkgAiBYvBwAVxhGbLRgMXBgQgo+DdosGSel0Yykoiw63lV8LtKALnfKGVuz2tpStfrwe5JuBc9kCfouijcq22w7dsTWji/CVjA5rhdsJkqgmMcShSy0iai4OUNApHRLhRreBp14HFbdNuXirEKr7V4li9bUvTl+4HuQpwdtu+Vzhj3/9YKrEOzzEqJJYRJsoh9mcyUEoa6xIiBiIyLZJnBcEd00YvzwScm2dtv56QImn6cC6UFLx598L4wr0gVwEWGrvkHzXJG7mAx5PPOnAMgoCCgAWlbTTJkRQ9oGBanXi5hv9LYUOG6bCIDi/zjxuLUqJKCs1CQNSwN1ed+nktyP8AFhq7TkjCexIwCztJgsS+36IqHrdtcG4ZlTQUY8LYa8ryMuBMmATRr3oOehXo9tOVMjobfDNd7YZW8GZUwW7X0yOM7ipO9awL+Gums8SZ5UvSFurISjFwRQxWpACHs5gzMUaydlFS5RtLeC6H6KpR7d3QsVsykfyOMfqSpLxiw+IRxQ4s+xhA+SrBbDuKYgJEyBnzdWY3CEsLMbZzcfwlvSJWQm5oH1wv0/T3nqODwYUzn6fjV7cW8OG+weD86TQD9g8F5099ll4F8wPDwcjJT9IL2NM3GFxIs8WpBzwyMBycS7PF+f7hYORUitfg4bRn8aHegWD07Mn0ZnG+fygYSfM+mPosPnT0rWD0zBcptrhvKBg5neJf3bWm7nmvVHkxV53Z0GVoIyek5LBcR7ne9GTWrtiZJ8ozv9/K7ltATAdz4dUf6gi5qmtdgAWv8whxnmNx7SIc8e2dott6AJfvnvs3hbMuwJt+5xsWEx/qyxtAj+SKk+lLkrns/hNK0fG24kRmUyRbEaQuBbcCaMvuJFsFm3oF/waUNbk4yszX8AAAAABJRU5ErkJggg=='>ここには傘がありません。残念でしたね。</image></p>
    	        <p><image src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAA5lJREFUWEftl0toXFUYx3/fufNoZvJOpESiqItCQYRE24K0ghsRFMHWlGk0aStW3IgLwY0bC65c6k5baxNJAtVU3KhQXCgWY2qbZUVcaHz0VjqdOJl0Zu6958i5c8c8+kiaTOCCPXAZ5juv3/z/3/dxR4j5kJjzcQdwow7dUTA2CuZP82Xnszy5UaCV+xtm8dXPcNtn6JG30I2EXBegmWJPfpaeVFsNJdUE85c4vqWDNypF5rZ04F/Lg5Pkl7YFZmQ/wXqhbwuwepZj5TySuYsn/Gv0VoqQ6QYlMPcHtN4NfgW8CiQy4Cgulv9hKrsVz+nnyHog1wRoLvDO3J/kMm3c46RAkqFiZLpAObVrS5ch2wW2s5oqaAV+GVItIBpKV5ht7uao7OD47YDeEtBM86A2HCoXeD3dAioBxoAOwEkDVcACBlCt1KzGRDGByhyoJCSztbi3AOIQJJvYLn38vBbQmwKaaXIGxi1QuMgB44O1NWnts4C2HOxk/RT73T6J6FOD50MyGaEIlAshdCGdZUB2cGY1yBsC+jMMqYB3jaY9XGBVEQj82nHW5nDYuAVSNXhRK4DtEoGFK5H90Q+qlkBXmW1q5XnZxbe3grwO0Jxjt1F8U5xFWu4FvEXAwq/Qft8SG+u1uRTQ3mZPXaLifyrbuN2zeKsWhy7po3AzyOsA9Xl0tYhYCx17SbTCKiFLm0X9sgjIFoUVMFy/HCJUev4yNG9dVNj3QHu1vPUddqb6mL4R5DJAM83bQcCbWkOibmO0y7aOMJfqO6y99rFDgTZRRdt5mwohbZQCDpT+hmz38v02lukASfOD6mPXqoD6R0p4/KZhW9g+HE6jcRD2GE2nCFNieC003kR4KkTpOftT7+ij239/ioAAE9Y3nkIlHR7TAduM5hXlcBHFJXyuGmGn8ekVRVnSfC159snjlFdCrqkPrlZpdn7w8Mvu2In3rYkNHf8fwNzwS+7EyLH4Krg3N+ROTozGGHBw2J0cG4kv4DPPHXA//2Q8voADQ4fdU6Mn4gu4b/Cg++nYyfgCxr6KB1445J76+KP4Knjg4BF3/OQH8QXcG/c2kxt+0Z0Y+TC+Csa+zRS/SxWbW6r75SG+aOTrzIbeZsz3tJIgK4/wl77AvGiG5WEm4wN4jgGE+z3hqwSckQUekN0UYwPoT/G0cngPTZUE7aqf+BVJcJ6jwKtOP52NVK5+1oZycDOANu0/yWbBxl7BfwGHzTo41dYFLAAAAABJRU5ErkJggg=='>残りが5本未満です。走れば間に合うかもね。</image></p>
    	        <p><image src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAA/pJREFUWEftl1tsFFUch78zs7OXLt1Wai/aYmyDkOijRl+UtqCGGH0BL6WKpUmpDz4oaSw++LB9ITGt4iXERDCACjVq+2RUJArWkhhN38SAGElLoc5atFt72Z3bMWenDQFb2XYxmYdOMpmdzbl85/v9z8yuIOCHCDgfK4CFJrRiMDgGt7zxJf0vbi4U6Nr+hUecTGqcTkQwYsOc1aoZes4B5I0CXQagFDz/+QP88WsVJdWQmSoHsZnM5CbiN71JZuZn6tZnGTkLiYpR9PAQbz+SXS7w0gBfOHaAyXGNm299iJl0DbPTEC+FaBGMnoHqO2BmGqQNoQiEY8OkLgxSVTtLd8PO5UDmB/jSt938/stTVK5dg+VAPAKpi7C6EkIhkAIunYeK28DQAQ88j9wCtAgYIUgNX6C8toue+veWAvrfgLu+ugdXHGHqr3WUrIZYFKQHrgIAIga4Ljjq3oWwAUKAphA0SI/710QpZByw0qCHIRxfR3f9uXxAFwfcPdBENtPrTxzzLUgHpiYhVgyRMDmbajsoYE2ArpF7N6n7HKiA6TQUlfhGNQ0uXwKhT5Aoa6K48ThJoZa66LEwYOfJ7bjyLXRKc/G5EnQB4yOq8P36modR9tTnkA4ZG6T0wRSgOkMCRs/BLWuvgP/9J7j2RRLlLby+8eulAXacuB9dG2DCFDmY3GSqrCSMqTq73f9O3SuYcMi3o0yGNP86b1GBqzNrQcjw2ym7qoFrqxQ8Yl4ZycaJxSCvNtg5WIx0JpmegKI4GFGwXb+vY4Nh+HCqnuIGWCrKOXgFmnWuWFNgahG2Mixg7DeoqvVjVguzLbCzEF2lFnUvrzX8uBDk1YAdJ/YjvDY8B/SID6MiVlpSI1CxBoSaeK7mnLnoczHPDaUA1E5WpnKbSYLjwvgwVNX5YymJqn1qGMpqQNd/oLvhvusDvjzwE0KzcO06hL4PyRiutEDGcWa7iBa1IeR5XGljADNANCJwncTd6cH+oZL6TWCBEfbnUpb0kI7tajjWN4SjX+DJUwimEDRiZx5GaqfR9OPs3bjn+oD57PtF2mxrbTd7D75bWcAQC3bN70Gdx6zbdrSbvYdWAPNQtUiTx59pNT/98GBwI35ie6v5yQcBBtzS3GL2Hz0cXIOB3yTNre3m0SA/Zh7d2mR+1vdRcCMOvMEnn20zP37/QHANbn16h9l35FCAAZtbzL5AP2Zadpq9h/cH16Cx69i4benr2ffg5eW/MP/ds7BfM8nvE1hWnD0bxnjlVIpQaQ3Ju6zgAKp/ftK7k0j4DJazl1c3BCzi3ScfA/EOkiI8adPTEDBAlWXndx143ip66rtuZLTzYxVWg/8H0TVjrgAWKvkf9Jh5OJrwEYcAAAAASUVORK5CYII='>まだ5本以上傘が残っています。ゆっくり歩いて取りに行こう。</image></p>
                <p>地図上の傘マークをクリックすると残数が確認できます。</p>
            </div>
        </div>
    </body>
    <script type="application/javascript">const kasa = @json($kasa);</script>
    <script type="application/javascript" src="{{ asset('js/result.js') }}"></script>
	<script type="application/javascript" src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyA1L0f4yQ3EIGy6TsFSt7W6c8dZ_p2cIG0&callback=initMap" async defer>
	</script>
</div>
</html>

@endsection