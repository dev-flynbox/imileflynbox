@extends('imilezcart::layouts.blank')
@push('style')
    <style type="text/css">
        td {
            padding: 5px 15px;
        }
    </style>
@endpush
@section('content')
    <h2 style="text-align: center">
        Order <span style="color: blue">{{$order->order_number}}</span>:
    </h2>
    <h4>
        <div style="margin-top: 2rem;text-align: -webkit-center;">
            @if($data)
                <table>
                    <tbody>
                    <tr>
                        <td>
                            Shipment provider
                        </td>
                        <td>
                            {{ ( $order->carrier ? $order->carrier->name : "N/A" ) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bill No
                        </td>
                        <td>
                            {{ $data['billNo'] == '' ? "N/A" : $data['billNo'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Latest Status
                        </td>
                        <td>
                            {{ $data['latestStatus'] == '' ? "N/A" : $data['latestStatus'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Latest Status Time
                        </td>
                        <td>
                            {{ $data['latestStatusTime'] == '' ? "N/A" : $data['latestStatusTime'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Latest Site
                        </td>
                        <td>
                            {{ $data['latestSite'] == '' ? "N/A" : $data['latestSite'] }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            @else
                Tracking Not Available!
            @endif
        </div>
    </h4>
@endsection
