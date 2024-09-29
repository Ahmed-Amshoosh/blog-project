@extends('layouts.dashboard')

@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome Admin! </h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-command w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Views</h6>
                                <h3>{{$totalViews}}+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('img/icons/views.png')}}" width="50" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-command w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Users</h6>
                                <h3>{{$count_users}}+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('img/icons/users.webp')}}" width="50" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Comments</h6>
                                <h3>{{$count_comment}}+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('img/icons/comment.png')}}"  width="50" alt="Dashboard Icon">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>ِArticles</h6>
                                <h3>{{$count_post}}+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('img/icons/article.webp')}}" width="50" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <canvas id="visitorsChart"></canvas>


{{--        <div class="row">--}}
{{--            <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                <div class="card flex-fill fb sm-box">--}}
{{--                    <div class="social-likes">--}}
{{--                        <p>Like us on facebook</p>--}}
{{--                        <h6>50,095</h6>--}}
{{--                    </div>--}}
{{--                    <div class="social-boxs">--}}
{{--                        <img src="{{asset('img/icons/social-icon-01.svg')}}" alt="Social Icon">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                <div class="card flex-fill twitter sm-box">--}}
{{--                    <div class="social-likes">--}}
{{--                        <p>Follow us on twitter</p>--}}
{{--                        <h6>48,596</h6>--}}
{{--                    </div>--}}
{{--                    <div class="social-boxs">--}}
{{--                        <img src="{{asset('img/icons/social-icon-02.svg')}}" alt="Social Icon">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                <div class="card flex-fill insta sm-box">--}}
{{--                    <div class="social-likes">--}}
{{--                        <p>Follow us on instagram</p>--}}
{{--                        <h6>52,085</h6>--}}
{{--                    </div>--}}
{{--                    <div class="social-boxs">--}}
{{--                        <img src="{{asset('img/icons/social-icon-03.svg')}}" alt="Social Icon">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                <div class="card flex-fill linkedin sm-box">--}}
{{--                    <div class="social-likes">--}}
{{--                        <p>Follow us on linkedin</p>--}}
{{--                        <h6>69,050</h6>--}}
{{--                    </div>--}}
{{--                    <div class="social-boxs">--}}
{{--                        <img src="{{asset('img/icons/social-icon-04.svg')}}" alt="Social Icon">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('visitorsChart').getContext('2d');
        var visitorsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($statistics->keys()) !!},
                datasets: [{
                    label: 'Visitors',
                    data: {!! json_encode($statistics->pluck('visitors')) !!},
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                },
                    {
                        label: 'Views',
                        data: {!! json_encode($statistics->pluck('views')) !!},
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                    }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
