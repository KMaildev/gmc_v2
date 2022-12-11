@extends('layouts.menus.accounting')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-outer-wrapper">
                    <div class="another-table-wrapper">
                        <table id="post-data">
                            <thead class="tbbg">
                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; width: 1%; height: 50px;">
                                    #
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Date
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Month
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Year
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    IV-No
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Sale Type
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    IV-No2
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Principle/Interest/Other
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Purchase IV
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    A/C Code
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    A/C Head
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    A/C Name
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Description
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Cash AC
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Cash-In
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Cash-Out
                                </th>
                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; padding-right: 50px; padding-left: 50px;">
                                    Cash-Balance
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Bank AC
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Bank-In
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Bank-Out
                                </th>

                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; padding-right: 50px; padding-left: 50px;">
                                    Bank-Balance
                                </th>

                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; padding-right: 50px; padding-left: 50px;">
                                    Deposit(Cash+Bank)
                                </th>

                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; padding-right: 50px; padding-left: 50px;">
                                    Withdraw(Cash+Bank)
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Bank Name
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Action
                                </th>
                            </thead>
                            @include('cashbook_view.table_render')
                        </table>

                        <div class="ajax-load text-center" style="display:none">
                            <p><img src="{{ asset('img/loaderImg.gif') }}">Load More Post...</p>
                        </div>
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
                        $('.ajax-load').html("No more Posts Found!");
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
