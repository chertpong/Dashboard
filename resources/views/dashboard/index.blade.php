@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-2x fa-bar-chart">Game statistics</i></div>
                    <div class="panel-body">
                        <div id="dashboard-activity-dropdown" class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="activity-dropdown-menu-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="fa fa-calendar"></span> Activity <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="activity-dropdown-menu-btn">
                                <li><a href={{url('dashboard')}}>All</a></li>
                                {{--<li><a href="#">Last 7 days</a></li>--}}
                                {{--<li><a href="#">This month</a></li>--}}
                                {{--<li><a href="#">Last month</a></li>--}}
                                {{--<li><a href="#">Last 4 month</a></li>--}}
                                {{--<li><a href="#">This year</a></li>--}}
                            </ul>
                        </div>

                        <!-- Statistics start here -->
                        <div class="row row-eq-height visible-md visible-lg">
                            <div class="panel panel-default col-xs-12 col-md-4">
                                <div class="panel-heading">Score</div>
                                <div class="panel-body rating-score panel-height">
                                    <div id="div-rating-score" class="col-xs-offset-1">
                                        <input id="rating-score" class="rating" data-size="lg" data-symbol="&#xf005;"
                                               data-show-clear="false" data-glyphicon="false"
                                               data-rating-class="rating-fa" disabled>
                                        <span id="score-caption"></span>
                                    </div>
                                    <div class="row">
                                        <h4 class="col-xs-offset-1">Your score: <strong id="score-text">0</strong>{{$maxScore}}</h4>
                                        <h5 class="col-xs-offset-1">Maximum Bonus : x10</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default col-xs-12 col-md-4">
                                <div class="panel-heading">Number of avoidance attempts</div>
                                <div class="panel-body panel-height">
                                    <strong id="rightAvoidText">Number of avoidance right: </strong> <br>
                                    <strong id="leftAvoidText">Number of avoidance left: </strong> <br>
                                    <strong id="downAvoidText">Number of avoidance bend down: </strong> <br>
                                    <strong id="degreeOfTiltRightText">Maximum head tilt  of right: </strong> <br>
                                    <strong id="degreeOfTiltLeftText">Maximum head tilt of left: </strong> <br>
                                    {{--<div id="angle"></div>--}}
                                </div>
                            </div>
                            <div class="panel panel-default col-xs-12 col-md-4">
                                <div class="panel-heading">Average speed of attempts</div>
                                <div class="panel-body panel-height">
                                    <div id="speed"></div>
                                </div>
                            </div>
                        </div><!--row equal height-->
                        <div class="row row-eq-height visible-md visible-lg">
                            <div class="panel panel-default col-xs-12 col-md-4">
                                <div class="panel-heading">Time of activity</div>
                                <div class="panel-body panel-height">
                                    <div class="odometer col-xs-offset-2">0</div>
                                    <div id="timeDescription" class="description col-xs-offset-3">
                                        <h4>Time usage: </h4>
                                    </div>
                                    {{--<div id="timeac"></div>--}}
                                </div>
                            </div>
                            <div class="panel panel-default col-xs-12 col-md-4">
                                <div class="panel-heading">Estimated distance of head movement</div>
                                <div class="panel-body panel-height">
                                    <div id="distance"></div>
                                </div>
                            </div>
                            <div class="panel panel-default col-xs-12 col-md-4">
                                <div class="panel-heading">Calories</div>
                                <div class="panel-body panel-height col-xs-offset-2">
                                    <h4 id="calories-value"></h4>
                                    {{--<div id="calories"></div>--}}
                                </div>
                            </div>
                        </div><!--row equal height-->
                </div>
            </div>
        </div> <!--div row-->
    </div>
@endsection
@section('footer')
    <script>
        {{-- load all data to vars--}}
        var avoidData = [];
        var speedData = [];
        var angleData = [];
        var timeacData = [];
        var distanceData = [];
        var caloriesData = [];
        var scoreData = [];

        @if($gameDataIsArray)
            @foreach($gameData as $element)
                avoidData.push({{$element->avoid}});
                speedData.push({{$element->speed}});
                angleData.push({{$element->allDegreeAngle}});
                timeacData.push({{$element->time}});
                distanceData.push({{$element->distance}});
                caloriesData.push({{$element->calories}});
                scoreData.push({{$element->score}});
            @endforeach
        @else
            avoidData.push({{$gameData->avoid}});
            speedData.push({{$gameData->speed}});
            angleData.push({{$gameData->allDegreeAngle}});
            timeacData.push({{$gameData->time}});
            distanceData.push({{$gameData->distance}});
            caloriesData.push({{$gameData->calories}});
            scoreData.push({{$gameData->score}});
        @endif

        var avoidDataTotal =  avoidData.reduce(function(a,b){return a+b;});
        var speedDataTotal = speedData.reduce(function(a,b){return a+b;});
        var angleDataTotal = angleData.reduce(function(a,b){return a+b;});
        var timeacDataTotal = timeacData.reduce(function(a,b){return a+b;});
        var distanceDataTotal = distanceData.reduce(function(a,b){return a+b;});
        var caloriesDataTotal = caloriesData.reduce(function(a,b){return a+b;});
        var scoreTotal = scoreData.reduce(function(a,b){ return a+b});

        {{--justgauge script--}}
        var avoid, speed, angle, timeac,distance,calories;
        window.onload = function(){
//            var avoid = new JustGage({
//                id: "avoid",
//                value: (avoidDataTotal/avoidData.length).toFixed(2),
//                min: 0,
//                max: 100,
//                title: "Avoid",
//                label: "pounds"
//            });

            var speed = new JustGage({
                id: "speed",
                value: (speedDataTotal/speedData.length).toFixed(2),
                min: 0,
                max: 100,
                title: "Speed",
                label: "m/s",
                gaugeWidthScale: 0.2,
                levelColors: [
                    "#CCFF00",
                    "#00FF66",
                    "#0066FF"
                ],
                startAnimationTime: 2000,
                startAnimationType: ">",
                refreshAnimationTime: 1000,
                refreshAnimationType: "bounce"
            });

//            var angle = new JustGage({
//                id: "angle",
//                value: (angleDataTotal/angleData.length).toFixed(2),
//                min: 0,
//                max: 100,
//                title: "Angle",
//                label: "percentage"
//            });

//            var timeac = new JustGage({
//                id: "timeac",
//                value: (timeacDataTotal/timeacData.length).toFixed(2),
//                min: 0,
//                max: 100,
//                title: "Time",
//                label: "s"
//            });

            var distance = new JustGage({
                id: "distance",
                value: (distanceDataTotal/distanceData.length).toFixed(2),
                min: 0,
                max: 100,
                title: "Distance",
                label: "cm"
            });

//            var calories = new JustGage({
//                id: "calories",
//                value: (caloriesDataTotal/caloriesData.length).toFixed(2),
//                min: 0,
//                max: 100,
//                title: "Calories",
//                label: "cal",
//                gaugeWidthScale: 1.2
//            });

//            setInterval(function() {
//                avoid.refresh(getRandomInt(50, 100));
//                speed.refresh(getRandomInt(50, 100));
//                angle.refresh(getRandomInt(0, 50));
//                timeac.refresh(getRandomInt(0, 50));
//                distance.refresh(getRandomInt(0, 50));
//                calories.refresh(getRandomInt(0, 50));
//            }, 2500);
        };
        <!--Justgauge stop-->

        <!--Star-raing Start-->
        $("#rating-score").rating({
            'stars':'3',
            'min':'0',
            'max':'3',
            'starCaptionClasses':function(val){
                if(val<=0.5){ return 'label label-danger'}
                else if(val<=1){ return 'label label-warning'}
                else if(val<=1.5){ return 'label label-info'}
                else if(val<=2.5){ return 'label label-primary'}
                else{ return 'label label-success'}
            }
        });
        $("#rating-score").rating('update',((scoreTotal/400000)/scoreData.length).toFixed(1));

        <!--Star-raing Stop-->

        <!--Odometer Start-->
        window.odometerOptions = {
            format: '(ddd).dd',
            duration: 2000,
            animation: 'count'
        };
        setTimeout(
            function(){
                $('.odometer').html((timeacDataTotal/timeacData.length).toFixed(2));
            }
        ,200);
        setTimeout(function () {
            $('#timeDescription > h4').append((timeacDataTotal/timeacData.length).toFixed(2));
        },2200)
        <!--Odometer Stop-->

        <!--Custom-->
        $('#calories-value').text((caloriesDataTotal).toFixed(2)+' calories');
        $('#score-text').text(((scoreTotal/scoreData.length).toFixed(2))+'/');

        {{--add data to activity dropdown--}}
        var dropdownList = [];
        @foreach($dropdownMenuData as $element)
            var e = new Object();
            e = {
                id: "{{$element->id}}",
                create_date: "{{$element->create_date}}"
            };
            dropdownList.push(e);
        @endforeach
        dropdownList.reverse();
        dropdownList.forEach(function(e,i,a){
            console.log(e);
            $("#dashboard-activity-dropdown > ul").append('<li><a href="' +"{{url('dashboard/activity/id')}}"+'/'+e.id+'">'+ e.create_date+'</a></li>');
        });
        {{--@foreach($dropdownMenuData as $element)--}}
            {{--$("#dashboard-activity-dropdown > ul").append("<li><a href={{url('dashboard/activity/id').'/'.$element->id}}>{{$element->create_date}}</a></li>");--}}
        {{--@endforeach--}}

        <!--Add data to avoidance attempts-->
        var rightAvoidData = [];
        var leftAvoidData = [];
        var downAvoidData = [];
        var degreeTiltRightData = [];
        var degreeTiltLeftData = [];
        @if($gameDataIsArray)
            @foreach($gameData as $element)
                rightAvoidData.push({{$element->rightAvoid}});
                leftAvoidData.push({{$element->leftAvoid}});
                downAvoidData.push({{$element->downAvoid}});
                degreeTiltRightData.push({{$element->degreeTiltRight}});
                degreeTiltLeftData.push({{$element->degreeTiltLeft}});
            @endforeach
        @else
            rightAvoidData.push({{$gameData->rightAvoid}});
            leftAvoidData.push({{$gameData->leftAvoid}});
            downAvoidData.push({{$gameData->downAvoid}});
            degreeTiltRightData.push({{$gameData->degreeTiltRight}});
            degreeTiltLeftData.push({{$gameData->degreeTiltLeft}});
        @endif
        var rightAvoidTotal = rightAvoidData.reduce(function(a,b){ return a+b;});
        var leftAvoidTotal = leftAvoidData.reduce(function(a,b){ return a+b});
        var downAvoidTotal = downAvoidData.reduce(function(a,b){ return a+b});
        var degreeTiltRightTotal = degreeTiltRightData.reduce(function(a,b){ return a+b});
        var degreeTiltLeftTotal = degreeTiltLeftData.reduce(function(a,b){ return a+b});

        $("#rightAvoidText").append((rightAvoidTotal/rightAvoidData.length).toFixed(2));
        $("#leftAvoidText").append((leftAvoidTotal/leftAvoidData.length).toFixed(2));
        $("#downAvoidText").append((downAvoidTotal/downAvoidData.length).toFixed(2));
        $("#degreeOfTiltRightText").append((degreeTiltRightTotal/degreeTiltRightData.length).toFixed(2));
        $("#degreeOfTiltLeftText").append((degreeTiltLeftTotal/degreeTiltLeftData.length).toFixed(2));
    </script>
@endsection