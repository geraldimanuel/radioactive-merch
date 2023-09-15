<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container flex justify-center align-middle items-center">
        <div class="">
            <h1 class="font-taruno">Orders</h1>
            <table border="1" class="h-full" cellpadding="10">
                <tr>
                    <th>No</th>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Items</th>
                    <th>Total Price</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        <ul>
                            @foreach ($detailTrans as $obj)
                            @if ($obj->order_id == $order->id)
                            <li>
                                @foreach ($merchs as $merch)
                                @if ($merch->id == $obj->merch_id)
                                {{ $merch->name }} ({{ $obj->qty }})
                                @endif
                                @endforeach
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @foreach ($merchs as $merch)
                        @if ($merch->id == $obj->merch_id)
                        <a href="{{ asset('storage/' . $order->image) }}">
                            <img class="w-[150px] h-full object-cover cursor-pointer"
                                src="{{ asset('storage/' . $order->image) }}" />
                        </a>
                        @endif
                        @endforeach
                    </td>
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
        </div>
    </div>
</body>

</html>