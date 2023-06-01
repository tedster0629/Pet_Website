@extends('layouts.sidebar')
@section('title','Dashboard')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <style>
        .chart{
            min-width: 50%;
        }
    </style>
@endsection

@section('content')
    <div id="content" class="container-fluid">
        <div class="container-fluid d-flex align-items-center">
            <button type="button" id="sideBarCollapse" class="btn btn-secondary me-3"><i class="fa-solid fa-bars"></i></button>
            <h1 class="fw-bold">Dashboard</h1>
        </div>
        <div class="container d-flex flex-wrap align-items-center justify-content-evenly">
            <div class="chart">
                <canvas id="chart1"></canvas>
            </div>
            <div class="chart pie">
                <canvas id="chart2"></canvas>
            </div>
            <div class="chart pie">
                <canvas id="chart3"></canvas>
            </div>
            <div class="chart">
                <canvas id="chart4"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let province_chart=@json($province_chart);
        let pets_chart=@json($pets_chart);
        let is_adopted=@json($is_adopted);
        let pets_added_date=@json($pets_added_date);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('/js/dashboard.js')}}"></script>
@endsection