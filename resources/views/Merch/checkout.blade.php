{{-- isi form2 pas mau checkout --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

                if (empty($detailTrans)) {
                    echo "kosong";
                } else {
            ?>

            @foreach($detailTrans as $obj)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$obj->merch_id}}</td>
                    <td>{{$obj->qty}}</td>
                    <td>{{$obj->total_price}}</td>
                </tr>
                <?php $total += $obj->total_price; ?>
            @endforeach

            <?php } ?>
            <tr>
                <td colspan="3">Total</td>
                <td>{{$total}}</td>
            </tr>
        </table>

        <br/>

        {{-- <form action="/checkout" method="POST">
            @csrf
            <div class="mb-3 flex flex-col">
                <label for="name" class="">Nama</label>
                <input type="text" name="name" id="name" placeholder="Geri Geri Geri">
            </div>
            <div class="mb-3 flex flex-col">
                <label for="email" class="">Email</label>
                <input type="email" name="email" id="email" placeholder="geri@gmail.com">
            </div>
            <div class="mb-3 flex flex-col">
                <label for="phone" class="">Phone</label>
                <input type="number" name="phone" id="phone" placeholder="081221468932">
            </div>

            <button type="submit" class="text-red-800">GAS!</button>
        </form> --}}
</body>

</html>
