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
                            <img src="{{URL::asset('images/'.$project->fotonaam)}}" class=""></li>
                                <div class="carousel-caption">
                                    <h2>{{$project->titel}}</h2>
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
            <!-- TAB CONTROLLERS -->
            <input id="panel-1-ctrl" class="panel-radios" type="radio" name="tab-radios" checked>
            <input id="panel-2-ctrl" class="panel-radios" type="radio" name="tab-radios">
            <input id="panel-3-ctrl" class="panel-radios" type="radio" name="tab-radios">
            <input id="nav-ctrl" class="panel-radios" type="checkbox" name="nav-checkbox">

            <!-- TABS LIST -->
            <ul id="tabs-list">
                <!-- MENU TOGGLE -->
                <label id="open-nav-label" for="nav-ctrl"></label>
                <li id="li-for-panel-1">
                    <label class="panel-label" for="panel-1-ctrl">
                        Meest recent
                    </label>
                </li>
                <!--INLINE-BLOCK FIX-->
                <li id="li-for-panel-2">
                    <label class="panel-label" for="panel-2-ctrl">
                        Meest bekeken
                    </label>
                </li>
                <!--INLINE-BLOCK FIX-->
                <li id="li-for-panel-3">
                    <label class="panel-label" for="panel-3-ctrl">
                        Populairst
                    </label>
                </li>
                <label id="close-nav-label" for="nav-ctrl">Sluiten</label>
            </ul>

            <!-- THE PANELS -->
            <article id="panels">
                <div class="container">
                <div class="panel_container">
                    <section id="panel-1">
                        <div class="main">
                            <ul>
                                @foreach($projects->sortByDesc('einddatum') as $project)
                                    <li><img src="{{URL::asset('images/'.$project->fotonaam)}}" alt=""></li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                    <section id="panel-2">
                        <div class="main">
                            <ul>
                                @foreach($projects->sortByDesc('aantal_bekeken') as $project)
                                    <li><img src="{{URL::asset('images/'.$project->fotonaam)}}" alt=""></li>
                                @endforeach
                        </div>
                    </section>
                    <section id="panel-3">
                        <div class="main">
                            <ul>
                                @foreach($projects->sortByDesc('likes') as $project)
                                    <li><img src="{{URL::asset('images/'.$project->fotonaam)}}" alt=""></li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection