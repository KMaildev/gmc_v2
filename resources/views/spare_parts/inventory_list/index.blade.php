@extends('layouts.menus.spare_part')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Inventory List
                        </h5>
                        @include('spare_parts.inventory_list.shared.filter_action')
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">
                        <table class="table table-bordered main-table" style="margin-bottom: 10px">
                            @include('spare_parts.inventory_list.shared.thead')

                            <tbody>
                                @foreach ($spare_part_items as $key => $spare_part_item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $spare_part_item->part_number ?? '' }}
                                        </td>

                                        <td>
                                            {{ $spare_part_item->part_name ?? '' }}
                                        </td>

                                        {{-- Local Price  --}}
                                        <td>
                                            {{ $spare_part_item->part_name ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
