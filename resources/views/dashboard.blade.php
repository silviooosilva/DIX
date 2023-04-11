@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="h1">DIX - Challenge</h5>
                        <h2 class="card-title h3">By: Silvio Silva</h2>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


@endsection

@push('js')
<script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
<script>
    $(document).ready(function() {
        demo.initDashboardPageCharts();
    });
</script>
@endpush
