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
@foreach ($purchase_order->purchase_items_table as $key => $purchase_item)
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

        <td style="text-align: right">
            {{-- {{ $purchase_item->qty ?? 0 }} --}}

            @foreach ($purchase_item->arrival_items_table as $arrival_items)
                {{ $arrival_items->shipping_qty ?? 0 }}
            @endforeach
        </td>

        <td style="text-align: right">
        </td>

        <td style="text-align: right">

        </td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
@endforeach
