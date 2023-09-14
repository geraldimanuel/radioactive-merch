{{-- list merch --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Merch</title>
</head>
<body>
    <h1>List Merch</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php $no = 1; ?>
        @foreach($merch as $obj)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$obj->name}}</td>
                <td>{{$obj->price}}</td>
                <td>
                    <form action="{{url('/cart/'.$obj->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$obj->id}}">
                        <input type="number" name="qty" id="qty" value="1">
                        <input type="submit" value="Add to Cart">
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4"></td>
            <td>
                <a href="{{url('/cart')}}">Cart</a>
            </td>
        </tr>
    </table>
</body>
</html>