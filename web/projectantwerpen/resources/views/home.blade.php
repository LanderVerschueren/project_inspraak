@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="carousel-margin">
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
                        <img src="{{ URL::asset('images/mas.jpg') }}" alt="Foto van het MAS (Museum aan de Stroom)">
                        <div class="carousel-caption">
                            <h2>Museum aan de stroom</h2>
                        </div>
                    </div>
                    
                    <div class="item">
                        <img src="{{ URL::asset('images/grote_markt.jpg') }}" alt="Foto van de Grote Markt te Antwerpen">
                        <div class="carousel-caption">
                            <h2>Grote Markt</h2>
                        </div>
                    </div>
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

            <!-- TABS LIST -->
            <ul id="tabs-list">
                <!-- MENU TOGGLE -->
                <label id="open-nav-label" for="nav-ctrl"></label>
                <li id="li-for-panel-1">
                    <label class="panel-label" for="panel-1-ctrl">Meest recent</label>
                </li>
                <!--INLINE-BLOCK FIX-->
                <li id="li-for-panel-2">
                    <label class="panel-label" for="panel-2-ctrl">Meest bekeken</label>
                </li>
                <!--INLINE-BLOCK FIX-->
                <li id="li-for-panel-3">
                    <label class="panel-label" for="panel-3-ctrl">Populairst</label>
                </li>
                <label id="close-nav-label" for="nav-ctrl">Sluiten</label>
            </ul>

            <!-- THE PANELS -->
            <article id="panels">
                <div class="container">
                    <section id="panel-1">
                        <main>
                            Meest recent
                        </main>
                    </section>
                    <section id="panel-2">
                        <main>
                            Meest bekeken
                        </main>
                    </section>
                    <section id="panel-3">
                        <main>
                            Populairst
                        </main>
                    </section>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection