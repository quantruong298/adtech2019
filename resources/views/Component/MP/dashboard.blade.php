<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
    <div class="container-fluid d-flex" >
    @include('Component.MP.menu')
        @if (\Request::is('mp/plans'))
            @component('Component.MP.Plan.index',['plans'=>$plans])
            @endcomponent
        @elseif (\Request::is('mp/campaigns'))
            @component('Component.MP.Campaign.index',['campaigns'=>$campaigns])
            @endcomponent
        @elseif(\Request::is('mp/adgroups'))
            @component('Component.MP.AdGroup.index',['adgroups'=>$adgroups])
            @endcomponent
        @elseif(\Request::is('mp/ads'))
            @component('Component.MP.Ads.index',['ads'=>$ads])
            @endcomponent
        @else
            <div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
                @component('Component.MP.General.index',['campaigns'=>$campaigns])
                @endcomponent
            </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/media.js') }}"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@endsection
