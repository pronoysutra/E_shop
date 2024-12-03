<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            max-width: 800px;
            margin: 0 auto;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .details-table th, .details-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 10px;
        }
        .details-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        .product-image {
            text-align: center;
            margin-top: 10px;
        }
        .product-image img {
            max-width: 200px;
            max-height: 200px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .footer {
            text-align: center;
            margin-top: 10px;
            color: #777;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Invoice</h1>
        </div>

        <table class="details-table">
            <tr>
                <th>Customer Name</th>
                <td>{{$order->name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$order->address}}</td>
            </tr>
            <tr>
                <th>Customer ID</th>
                <td>{{$order->user_id}}</td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td>{{$order->product_title}}</td>
            </tr>
            <tr>
                <th>Product Price</th>
                <td>{{$order->price}}</td>
            </tr>
            <tr>
                <th>Product Quantity</th>
                <td>{{$order->quantity}}</td>
            </tr>
            <tr>
                <th>Payment Status</th>
                <td>{{$order->payment_status}}</td>
            </tr>
            <tr>
                <th>Delivery Status</th>
                <td>{{$order->delivery_status}}</td>
            </tr>
            <tr>
                <th>Product ID</th>
                <td>{{$order->product_id}}</td>
            </tr>
        </table>

        <div class="product-image">
            <h3>Product Image</h3>
            <img src="product/{{$order->image}}" alt="Product Image">
        </div>

        <div class="footer">
            <p>Thank you for your purchase!</p>
        </div>
    </div>
</body>
</html>
