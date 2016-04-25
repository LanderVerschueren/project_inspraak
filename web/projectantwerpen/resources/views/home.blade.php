@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ URL::asset('images/mas.jpg') }}" alt="...">
                        <div class="carousel-caption">
                            <h2>Museum aan de stroom</h2>
                        </div>
                    </div>
                    
                    <div class="item">
                        <img src="{{ URL::asset('images/grote_markt.jpg') }}" alt="...">
                        <div class="carousel-caption">
                            <h2>Grote Markt</h2>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="">
            Something
        </div>
    </div>
</div>
@endsection