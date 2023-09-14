<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Orders</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Order ID</th>
            <th>Name</th>
            <th>Items</th>
            <th>Total Price</th>
            <th>Status</th>
        </tr>
        <?php $no = 1; ?>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>
                    <ul>
                        @foreach ($detailTrans as $obj)
                            @if ($obj->order_id == $order->id)
                                <li>
                                    @foreach ($merchs as $merch)
                                        @if ($merch->id == $obj->merch_id)
                                            {{ $merch->name }} ({{ $obj->qty }})
                                        @break
                                    @endif
                                @endforeach
                            </li>
                        @endif
                    @endforeach
                </ul>
            </td>
            <td>{{ $order->total_price }}</td>
            <td>
                <select required='required' class="form-control" name='status'>
                    <optgroup label={{ $order->status }} />
                    <option value='Unpaid'>Unpaid</option>
                    <option value='Paid'>Paid</option>
                    <option value='Cancelled'>Cancelled</option>
                </select>
            </td>
        </tr>
    @endforeach
</table>
</body>

</html>
