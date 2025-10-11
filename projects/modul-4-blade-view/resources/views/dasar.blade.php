<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Passing Demo</title>
</head>
<body>
  <h1>Passing Data to Blade View</h1>

  <h2>String</h2>
  <p>Name: {{ $name }}</p>

  <h2>Array</h2>
  <ul>
    @foreach ($fruits as $fruit)
      <li>{{ $fruit }}</li>
    @endforeach
  </ul>

  <h2>Associative Array</h2>
  <p>Name: {{ $user['name'] }}</p>
  <p>Email: {{ $user['email'] }}</p>
  <p>Status: {{ $user['is_active'] ? 'Active' : 'Inactive' }}</p>

  <h2>Object</h2>
  <p>ID: {{ $product->id }}</p>
  <p>Product: {{ $product->name }}</p>
  <p>Price: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
</body>
</html>