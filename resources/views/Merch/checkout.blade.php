{{-- isi form2 pas mau checkout --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    @vite('resources/css/app.css')
    <title>List Merch</title>
</head>

<body>
    <h1>Order Merch</h1>

    <h2>Detail Transaksi</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        <?php
        $no = 1;
        $total = 0;
        ?>
        @foreach ($detailTrans as $obj)
            <tr>
                <td>{{ $no++ }}</td>
                @foreach ($merchs as $merch)
                    @if ($merch->id == $obj->merch_id)
                        <td>{{ $merch->name }}</td>
                    @break
                @endif
            @endforeach
            <td>{{ $obj->qty }}</td>
            <td>{{ $obj->total_price }}</td>
        </tr>
        <?php $total += $obj->total_price; ?>
    @endforeach
    <tr>
        <td colspan="3">Total</td>
        <td>{{ $total }}</td>
    </tr>
    <tr>
        <td colspan="3">Status</td>
        <td>{{ $order->status }}</td>
    </tr>
</table>
<div id="pay-button" class="bg-green-300 rounded-md font-bold flex justify-center items-center py-1 cursor-pointer">
    Pay
</div>

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                // alert("payment success!");
                // tinggal diubah aja sesuai kalian maunya gimana
                window.location.href = '/invoice/{{ $order->id }}';
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });
</script>

</body>

</html>
