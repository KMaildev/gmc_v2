@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Profit and Loss
                        </h5>
                        @include('reporting.profit_loss.filter_action')
                    </div>
                </div>


                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
