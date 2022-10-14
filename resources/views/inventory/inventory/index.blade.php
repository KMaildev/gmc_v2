@extends('layouts.menus.inventory')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Inventory
                        </h5>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table">
                        <thead style="background-color: #2e696e;">

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">
                                Sr.No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Product Name
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Models
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                "MGM" WAREHOUSE
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Sale
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Sale Returned
                            </th>
                        </thead>

                        <tbody class="table-border-bottom-0">
                            @foreach ($arrival_informations as $key => $arrival_information)
                                {{-- arrival_information --}}
                                <tr style="background-color: #DDEBF7;">
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td colspan="5" style="text-align: center">
                                        Myanmar Great Motor Co.,Ltd Vehicle List for
                                        {{ $arrival_information->arrival_date ?? '' }}
                                        <span style="font-weight: bold">
                                            ({{ $arrival_information->arrival_items_table->sum('shipping_qty') }} Unit)
                                        </span>
                                    </td>
                                </tr>

                                {{-- Arrived Items --}}
                                @php
                                    $total_shipping_qty = [];
                                @endphp
                                @foreach ($arrival_information->arrival_items_table as $key => $arrival_items)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $arrival_items->purchase_items_table->brands_table->name ?? '' }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $arrival_items->purchase_items_table->type_of_models_table->title ?? '' }}
                                        </td>

                                        {{-- "MGM" WAREHOUSE --}}
                                        <td style="text-align: right;">
                                            @php
                                                $shipping_qty = $arrival_items->shipping_qty ?? 0;
                                                echo $shipping_qty;
                                                $total_shipping_qty[] = $shipping_qty;
                                            @endphp
                                        </td>

                                        {{-- Sale --}}
                                        <td style="text-align: right;">
                                            @php
                                                $sale_item_qty = [];
                                            @endphp
                                            @foreach ($arrival_items->shipping_chassis_management_table as $shipping_chassis_management)
                                                @foreach ($shipping_chassis_management->products_table ?? '' as $product)
                                                    @foreach ($product->sales_items_table_for_inventory as $sales_items)
                                                        @php
                                                            $sale_item_qty[] = $sales_items->qty;
                                                        @endphp
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            @php
                                                $sale_item_qty = array_sum($sale_item_qty);
                                                echo $sale_item_qty;
                                            @endphp
                                        </td>


                                        {{-- Sale Returned --}}
                                        <td style="text-align: right;">

                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
