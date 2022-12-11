@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Cash Book</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered main-table text-nowrap table-responsive">
                        @include('cashbook_view.table_header')
                        <tbody class="mytbody table-border-bottom-0 row_position" id="post-data">
                            @include('cashbook_view.table_render')
                        </tbody>
                    </table>

                    <div class="ajax-load text-center" style="display:none">
                        <p>
                            <img src="{{ asset('media/loading.gif') }}" style="width: 30px;">
                            Load More Data...
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
        function loadMoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: 'get',
                    beforeSend: function() {
                        $(".ajax-load").show();
                    }
                })
                .done(function(data) {
                    if (data.html == "") {
                        $('.ajax-load').html("No more data!");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
                // Call back function
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert("Server not responding.....");
                });

        }
        //function for Scroll Event
        var page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });
    </script>
@endsection
