@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Game statistics</div>
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
                        <div class="panel panel-default col-xs-12 col-md-4">
                            <div class="panel-heading">Number of avoidance attempts</div>
                            <div class="panel-body">
                                <div id="avoid"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-4">
                            <div class="panel-heading">Average speed of attempts</div>
                            <div class="panel-body">
                                <div id="speed"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-4">
                            <div class="panel-heading">Number of avoidance attempts</div>
                            <div class="panel-body">
                                <div id="angle"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-4">
                            <div class="panel-heading">Time of activity</div>
                            <div class="panel-body">
                                <div id="timeac"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-4">
                            <div class="panel-heading">Estimated distance of head movement</div>
                            <div class="panel-body">
                                <div id="distance"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-12 col-md-4">
                            <div class="panel-heading">Calories</div>
                            <div class="panel-body">
                                <div id="calories"></div>
                            </div>
                        </div>
                </div>
            </div>
        </div> <!--div row-->
    </div>
@endsection
@section('footer')
    <script>
        {{--add data to activity dropdown--}}
        @foreach($dropdownMenuData as $element)
            @if($element->type==0)
                $("#dashboard-activity-dropdown > ul").append("<li><a href={{url('dashboard/activity/date').'/'.$element->create_date}}>{{$element->create_date}}</a></li>");
            @endif
        @endforeach

        {{-- load all data to vars--}}
        var avoidData = [];
        var speedData = [];
        var angleData = [];
        var timeacData = [];
        var distanceData = [];
        var caloriesData = [];

        @foreach($gameData as $element)
            @if($element->type == 0)
                avoidData.push({{$element->data}});
            @elseif($element->type == 1)
                speedData.push({{$element->data}});
            @elseif($element->type == 2)
                angleData.push({{$element->data}});
            @elseif($element->type == 3)
                timeacData.push({{$element->data}});
            @elseif($element->type == 4)
                distanceData.push({{$element->data}});
            @elseif($element->type == 5)
                caloriesData.push({{$element->data}});
            @endif
        @endforeach

        var avoidDataTotal =  avoidData.reduce(function(a,b){return a+b;});
        var speedDataTotal = speedData.reduce(function(a,b){return a+b;});
        var angleDataTotal = angleData.reduce(function(a,b){return a+b;});
        var timeacDataTotal = timeacData.reduce(function(a,b){return a+b;});
        var distanceDataTotal = distanceData.reduce(function(a,b){return a+b;});
        var caloriesDataTotal = caloriesData.reduce(function(a,b){return a+b;});


        {{--justgauge script--}}
        var avoid, speed, angle, timeac,distance,calories;
        window.onload = function(){
            var avoid = new JustGage({
                id: "avoid",
                value: (avoidDataTotal/avoidData.length).toFixed(2),
                min: 0,
                max: 100,
                title: "Avoid",
                label: "pounds"
            });

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

            var angle = new JustGage({
                id: "angle",
                value: (angleDataTotal/angleData.length).toFixed(2),
                min: 0,
                max: 100,
                title: "Angle",
                label: "degree"
            });

            var timeac = new JustGage({
                id: "timeac",
                value: (timeacDataTotal/timeacData.length).toFixed(2),
                min: 0,
                max: 100,
                title: "Time",
                label: "s"
            });

            var distance = new JustGage({
                id: "distance",
                value: (distanceDataTotal/distanceData.length).toFixed(2),
                min: 0,
                max: 100,
                title: "Distance",
                label: "cm"
            });

            var calories = new JustGage({
                id: "calories",
                value: (caloriesDataTotal/caloriesData.length).toFixed(2),
                min: 0,
                max: 100,
                title: "Calories",
                label: "cal",
                gaugeWidthScale: 1.2
            });

//            setInterval(function() {
//                avoid.refresh(getRandomInt(50, 100));
//                speed.refresh(getRandomInt(50, 100));
//                angle.refresh(getRandomInt(0, 50));
//                timeac.refresh(getRandomInt(0, 50));
//                distance.refresh(getRandomInt(0, 50));
//                calories.refresh(getRandomInt(0, 50));
//            }, 2500);
        };
    </script>
@endsection