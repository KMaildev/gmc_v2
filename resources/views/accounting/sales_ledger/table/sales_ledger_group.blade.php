<table class="" style="margin-bottom: 1px !important;">
    <thead class="tbbg">
        <tr>
            <td rowspan="2" style="color: white; text-align: center; width: 1%;">
                Sr.No
            </td>
            <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Dealer Name
            </td>
            <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Revenue
            </td>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($sales_invoices_groups as $k => $sales_invoices_group)
            <tr>
                <td>
                    {{ $k + 1 }}
                </td>

                <td>
                    {{ $sales_invoices_group->customers_table->name ?? '' }}
                </td>

                <td style="text-align: right; font-weight: bold;">
                    {{ number_format($sales_invoices_group->total_amount, 2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tr>
        <td colspan="2">
            Total:
        </td>
        <td style="text-align: right; font-weight: bold;">
            {{ number_format($sales_invoices_group->sum('total_amount'), 2) }}
        </td>
    </tr>
</table>
