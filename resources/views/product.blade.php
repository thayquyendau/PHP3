<h1>Quan li san pham</h1>

<a href="{{ route('product.add')}}"> Them san pham</a>
<table>
    <thead>
        <tr>
            <th>Ten san pham</th>
            <th>Gia san pham</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product['name']}}</td>
                <td>{{$product['price']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>