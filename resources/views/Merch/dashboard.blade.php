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
                                    <img class="w-[150px] h-full object-cover cursor-pointer"
                                        src="{{ asset('storage/' . $order->image) }}" alt="Flower"
                                        onclick="showModalasset('storage/' . $order->image) }}" />
                                @endif
                                <div id="modal"
                                    class="hidden fixed top-0 left-0 z-80 w-screen h-screen bg-black/70  justify-center items-center">

                                    <a class="fixed z-90 top-6 right-8 text-white text-5xl font-bold"
                                        href="javascript:void(0)" onclick="closeModal()">&times;</a>

                                    <img id="modal-img" class="max-w-[800px] max-h-[600px] object-cover" />
                                </div>
                            @endforeach
                        </td>
                        <td>
                            <a href="/approval/{{ $order->id }}/paid">Paid</a>
                            <a href="/approval/{{ $order->id }}/cancelled">Cancelled</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        var modal = document.getElementById("modal");

        var modalImg = document.getElementById("modal-img");

        function showModal(src) {
            modal.classList.remove('hidden');
            modalImg.src = src;
        }

        function closeModal() {
            modal.classList.add('hidden');
        }
    </script>

</body>

</html>
