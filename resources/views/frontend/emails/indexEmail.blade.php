<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết giỏ hàng</title>
    <style>
        /* CSS tùy chỉnh */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h2>Chi tiết giỏ hàng</h2>
    <table>
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $key => $item)
            <tr>
                <td><img src="{{ $item['image'] }}" alt=""></td>
                <td>
                                <h4><a href="">{{$item['name']}}</a></h4>
								<p>Web ID: {{$key}}</p>

                </td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] * $item['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="total">Tổng cộng: {{ $totalPrice+2 }}</p>
</body>
</html>
