

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Printly') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Printly') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('public.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('public.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin') }}"
                                    >
                                       {{ __('public.admin') }}
                                   </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>

var cart = {
	'add': function(product_id, quantity , type) {
		$.ajax({
			url: '/addToCart',
			type: 'post',
            headers:{ 'Authorization': 'Bearer ' + $('meta[name=csrf-token]').attr("content"),},
			data: '_token={{csrf_token()}}'+'&type='+type+'&product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', "Bearer" + " " + $('meta[name=csrf-token]').attr("content"));
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				$('.alert-dismissible, .text-danger').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}

				if (json['success']) {
					$('#app').parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json["data"].message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {
						$('#cart > button').html('<span id="cart-total"><img src="catalog/view/theme/default/image/icon-cart.png"> ' + json['total'] + '</span>');
					}, 100);

					$('html, body').animate({ scrollTop: 0 }, 'slow');

					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
                var res = JSON.parse(xhr.responseText);
                console.log(res);
                if(res.message == "Unauthenticated."){
                  window.location = '/login';
                }else{
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
			}
		});
	},
	'update': function(key, quantity) {
		$.ajax({
			url: 'edit_cart',
			type: 'post',
			data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span id="cart-total"><img src="catalog/view/theme/default/image/icon-cart.png"> ' + json['total'] + '</span>');
				}, 100);


			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function(key) {
		$.ajax({
			url: '/remove_from_cart',
			type: 'post',
			data: '_token={{csrf_token()}}'+'&key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
			if(json['success']){
                location.reload();
            }else{
                $('#app').parent().before('<div class="alert alert-danger alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['message'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

            }


			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
}

var wishlist = {
	'add': function(product_id, quantity , type) {
		$.ajax({
			url: '/addToWishlist',
			type: 'post',
            headers:{ 'Authorization': 'Bearer ' + $('meta[name=csrf-token]').attr("content"),},
			data: '_token={{csrf_token()}}'+'&type='+type+'&product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', "Bearer" + " " + $('meta[name=csrf-token]').attr("content"));
				$('#wishlist > button').button('loading');
			},
			complete: function() {
				$('#wishlist > button').button('reset');
			},
			success: function(json) {
				$('.alert-dismissible, .text-danger').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}

				if (json['success']) {
					$('#app').parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json["data"].message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {
						$('#wishlist > button').html('<span id="cart-total"><img src="catalog/view/theme/default/image/icon-cart.png"> ' + json['total'] + '</span>');
					}, 100);

					$('html, body').animate({ scrollTop: 0 }, 'slow');

					$('#wishlist > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
                var res = JSON.parse(xhr.responseText);
                console.log(res);
                if(res.message == "Unauthenticated."){
                  window.location = '/login';
                }else{
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
			}
		});
	},
	'update': function(key, quantity) {
		$.ajax({
			url: 'edit_wishlist',
			type: 'post',
			data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span id="cart-total"><img src="catalog/view/theme/default/image/icon-cart.png"> ' + json['total'] + '</span>');
				}, 100);


			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function(key) {
		$.ajax({
			url: '/remove_from_cart',
			type: 'post',
			data: '_token={{csrf_token()}}'+'&key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
			if(json['success']){
                location.reload();
            }else{
                $('#app').parent().before('<div class="alert alert-danger alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['message'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

            }


			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
}
</script>
