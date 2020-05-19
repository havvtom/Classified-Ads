@extends('layouts.app')

@section('content')
    @foreach($areas as $area)
    <div class="card">       
        <div class="card-header">
            <h1>{{$area->name}}</h1>
        </div>
        <div class="card-body">           
            <div class="row">
                @foreach($area->children as $province)
                <div class="col-md-4">
                    <a href="{{$province->path()}}">
                        <h4>{{$province->name}}</h4>
                    </a>
                   @foreach($province->children as $city)
                        <div>
                            <a href="{{$city->path()}}">
                                <h5>{{$city->name}}</h5>
                            </a>
                            @foreach($city->children as $surbub)
                            <div>
                                <a href="{{$surbub->path()}}">{{$surbub->name}}</a>
                            </div>
                            @endforeach
                        </div>
                   @endforeach
                </div>
                @endforeach
            </div>           
        </div>       
    </div>
    @endforeach
@endsection
