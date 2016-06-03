@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="carousel-margin">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php $count = 0; ?>
                    @foreach($projects as $project)
                            <?php if($count == 2) break; ?>
                            <li data-target="#carousel-example-generic" data-slide-to="{{$count}}" class="{{($count === 0) ? 'active' : ''}}"></li>
                            <?php $count++; ?>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $count = 0; ?>
                    @foreach($projects as $project)
                            <?php if($count == 2) break; ?>
                            <div class="{{($count === 0) ? 'item active' : 'item'}}">
                            <img src="{{URL::asset('images/'.$project->image_name)}}" class=""></li>
                                <div class="carousel-caption">
                                    <h2>{{ $project->title }}</h2>
                                    <p>{{ $project->question }} - Al {{ $project->likes }} personen keurden dit goed!</p>
                                </div>
                            </div>
                            <?php $count++; ?>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <section class="wrapper">
                    <ul class="tabs">
                        <li class="active">Meest recent</li>
                        <li>Meest bekeken</li>
                        <li>Meeste likes</li>
                    </ul>

                    <ul class="tab__content">
                        <li class="active">
                            <div class="content__wrapper">
                                @foreach($projects->sortByDesc('einddatum')->slice(0,3) as $project)                                    
                                    <a href="{{ url('/project/'.$project->id) }}">
                                        <h4> {{ ucfirst( $project->title ) }} </h4>
                                        <img src="{{URL::asset('images/'.$project->image_name)}}" alt="">
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <div class="content__wrapper">
                                @foreach($projects->sortByDesc('aantal_bekeken')->slice(0,3) as $project)
                                    <a href="{{ url('/project/'.$project->id) }}">
                                        <h4> {{ ucfirst( $project->title ) }} </h4>
                                        <img src="{{URL::asset('images/'.$project->image_name)}}" alt="">
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <div class="content__wrapper">
                                @foreach($projects->sortByDesc('likes')->slice(0,3) as $project)
                                    <a href="{{ url('/project/'.$project->id) }}">
                                        <h4> {{ ucfirst( $project->title ) }} </h4>
                                        <img src="{{URL::asset('images/'.$project->image_name)}}" alt="">
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection