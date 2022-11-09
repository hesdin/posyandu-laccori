@extends('user.app')

@section('content')
    <div class="col-12 col-lg-8 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title mb-0">Perkembangan Balita</strong>
            </div>
            @if ($chart)
            <div class="card-body" style="position: relative;">
                {!! $chart->container() !!}
            </div>
            @endif

        </div>

        <script src="{{ $chart->cdn() }}"></script>

        {{ $chart->script() }}

    </div>
@endsection
