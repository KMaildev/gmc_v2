@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Trial
                        </h5>
                        @include('reporting.trial.filter_action')
                    </div>
                </div>


                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">

                        <table class="table-bordered main-table" style="margin-bottom: 10px">

                            <thead class="tbbg">
                                <tr>
                                    <td style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                        No
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 7%;">
                                        IS/BS
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        Heading
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        Account Heading
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        DR
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        CR
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        DR
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        CR
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        DR
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        CR
                                    </td>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" id="tablecontents">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
