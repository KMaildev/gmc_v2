{{-- Products Info --}}
<tr style=" background-color: #DDEBF7; color: black">
    <td style="text-align: center; width: 1%;">
        #
    </td>
    <td style="text-align: center; width: 10%;">
    </td>

    <td style="text-align: center; width: 10%;">
    </td>

    <td style="text-align: center; width: 10%;">
        Balance Units
    </td>

    <td style="text-align: center; width: 10%;">
        Deposit ( USD )
    </td>

    <td style="text-align: center; width: 10%;">
        Advance Payment
    </td>

    <td></td>
    <td></td>
    <td style="color: red">
        Balanced
    </td>
    <td></td>
</tr>

{{-- Products Items --}}
@php
    $total_balance_units_qty = [];
@endphp
@foreach ($purchase_order->purchase_items_table as $key => $purchase_item)
    {{-- Balanced Unit Qty  --}}
    @php
        $total_shipping_qty = $purchase_item->arrival_items_table->sum('shipping_qty');
        $purchase_item_qty = $purchase_item->qty ?? 0;
        $balance_units = $purchase_item_qty - $total_shipping_qty;
        $total_balance_units_qty[] = $balance_units;
    @endphp
    @if ($balance_units > 0)
        <tr>
            <td style="text-align: center">
                {{ $key + 1 }}
            </td>

            <td style="text-align: center">
                {{ $purchase_item->brands_table->name ?? '' }}
            </td>

            <td style="text-align: center">
                {{ $purchase_item->type_of_models_table->title ?? '' }}
            </td>

            {{-- Balance Units --}}
            <td style="text-align: right">
                @php
                    echo $purchase_item->purchase_operation_items_table->id ?? 0;
                    echo $balance_units;
                @endphp
            </td>

            {{-- Deposit ( USD ) --}}
            <td style="text-align: right">
            </td>

            {{-- Advance Payment	 --}}
            <td style="text-align: right">

            </td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endif
@endforeach

<tr style="background-color: #FEF2CC;">
    <td colspan="3">
        Total Balanced
    </td>

    {{-- Shipping Quantity	Total --}}
    <td style="text-align: right">
        @php
            $total_balance_units_qty = array_sum($total_balance_units_qty);
            echo $total_balance_units_qty;
        @endphp
    </td>

    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
