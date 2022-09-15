@foreach ($purchase_order->arrival_information_table as $key => $arrival_information)
    <tr style="background-color: #DDEBF7; color: black;">
        <td style="text-align: center; width: 1%;">
            #
        </td>

        <td></td>

        <td style="text-align: center">
            {{ $arrival_information->arrival_date ?? '' }}
        </td>

        <td style="text-align: center">
            Shipping Quantity
        </td>

        <td style="text-align: center">
        </td>

        <td style="text-align: center">
        </td>

        <td style="text-align: center">
        </td>

        <td style="text-align: center">
        </td>

        <td style="text-align: center; color: red;">
            {{ $arrival_information->arrival_status ?? '' }}
        </td>

        <td>Edit</td>
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

            <td style="text-align: center">
                {{ $arrival_items->purchase_items_table->brands_table->name ?? '' }}
            </td>

            <td style="text-align: center">
                {{ $arrival_items->purchase_items_table->type_of_models_table->title ?? '' }}
            </td>

            {{-- Shipping Quantity --}}
            <td style="text-align: right">
                @php
                    $shipping_qty = $arrival_items->shipping_qty ?? 0;
                    echo $shipping_qty;
                    $total_shipping_qty[] = $shipping_qty;
                @endphp
            </td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    <tr style="background-color: #FEF2CC;">
        <td colspan="3">
            Total
        </td>

        {{-- Shipping Quantity	Total --}}
        <td style="text-align: right">
            @php
                $total_shipping_qty = array_sum($total_shipping_qty);
                echo $total_shipping_qty;
            @endphp
        </td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
@endforeach
