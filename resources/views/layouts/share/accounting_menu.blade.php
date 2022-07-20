<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Dashboard</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('accountingdashboard.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('accountingdashboard.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Customer Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('accountingdashboard.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Supplier Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('accountingdashboard.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Financial Dashboard</div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Customers</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('customer.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Dealer Customers</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hp_customer.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> HP Customers</div>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">
                        HP Sales
                    </div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('hp_sales_invoices.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> 
                                Sales Invoices
                            </div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Sales</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('sales_invoices.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales Invoices
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('sales_journal.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales Journal
                            </div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="#" class="menu-link menu-toggle">
                            <div data-i18n="Cash Collection">
                                Cash Collection
                            </div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('cash_collection.index') }}" class="menu-link">
                                    <div data-i18n="Cash Collection">
                                        Cash Collection
                                    </div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="{{ route('sale_refund.index') }}" class="menu-link">
                                    <div data-i18n="Refund">
                                        Refund
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu-item">
                        <a href="{{ route('sales_ledger.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales Ledger
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('account_receivables.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Account Receivales
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('sale_cash_book.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Cash Book
                            </div>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Suppliers</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('supplier.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Suppliers</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i2n="Without menu"> Supplier Purchase Orders</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i2n="Without menu"> Supplier Invoices</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i2n="Without menu"> Supplier Returns</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i2n="Without menu"> Supplier Payment</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i2n="Without menu"> Allocate Payments</div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Products</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('brand.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Brand</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('products.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Products</div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="{{ route('import_car.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Import Car
                            </div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item">
                <a href="{{ route('cashbook.index') }}" class="menu-link">
                    <div data-i1n="Layouts">
                        Cash Book
                    </div>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Reports</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('daily_report.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Daily Report</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Accounting</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('bankform.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Bank Form</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Chart of accounts</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('accountclassification.index') }}" class="menu-link">
                            <div data-i2n="Without menu">Account Classification </div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('accounttype.index') }}" class="menu-link">
                            <div data-i2n="Without menu">Account Type </div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('chartofaccount.index') }}" class="menu-link">
                            <div data-i2n="Without menu">Chart of accounts </div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('subaccount.index') }}" class="menu-link">
                            <div data-i2n="Without menu">Sub Account </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- / Menu -->
