<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo pedido</title>
</head>
<body>
	<p>Se ha realizado un nuevo pedido¡</p>
	<p>Estos son los datos del cliente que realizo el pedido :</p>
	<ul>
		<li>
			<strong>Nombre:</strong>
			{{$user->name}}
		</li>
		<li>
			<strong>E-mail:</strong>
			{{$user->email}}
		</li>
		<li>
			<strong>Fecha del pedido:</strong>
			{{$cart->order_date}}
		</li>
	</ul>
	<hr>
	<hr>
	<p>Estos son los detalles del pedido :</p>
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			{{ $detail->product->name }} x {{ $detail->quantity }}
			({{ $detail->quantity * $detail->product->price }})
		</li>
		@endforeach
	</ul>
	<p>
		<strong>Total que el cliente debe pagar :</strong> {{ $cart->total }}
	</p>
	<hr>
	<p>
		<a href="{{ url('/admin/orders/'.$cart->id) }}">Haz clic aquì</a>
		para ver mas informacion sobre este pedido.
	</p>
</body>
</html>