
<html lang="en">
	<!--begin::Head-->
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset_url('css/pages/login/classic/login-4.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset_url('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset_url('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset_url('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset_url('css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset_url('css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset_url('css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset_url('css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{asset_url('media/bg/bg-3.jpg')}}');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-10">
							<a href="#">
								{{-- <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADoAAAA5CAYAAABnLziGAAAABHNCSVQICAgIfAhkiAAABKdJREFUaEPtWl9MW1UY//W2paX0UsvKHC0ZVFMVMMysKKOFFthWNyWu6YMue1r2osYl6pvxmQdeXKKAaECT4cyc7o9zy+bmzBYyZSQS9+JwyUCGsLa0pS2t/Okaak4x6TRb+93qZcXc7+k+/H73fL/vnPPdc777yQB4ATyC/7f5ZQDCktA8Z1kmk0GlUkGpVAp6QyKRwPJyAkBKEI8AFmdGi4qKUFFhgsFgIPiQgczOzsLrvYNk8q4gHgEsjlCNRoOamlps3lxF8CEDGR+/hZs3f8Xy8rIgHgEsjlCe52G1WvHY4xaCDxnI2I1fcP36z1hcXBTEI4DFEarT6WCzNeOpmhqCDxkIEzlybRgLCwuCeASwOEL1ej3a2negvn4LwYcMZGTkGoaGruCPeFwQjwAWR2jZhg3YtftFWK0NBB8ykKtXh3Dp4gXEYjFBPAJYHKGG8nK43R402ewEHzKQ7y99h7NnvsH8fFQQjwAWR+jGjY9i7959cDidBB8ykPPnz+H48S8RjUQE8QhgcYRu2lSB/fsPYKdrJ8GHDOTUqZP4/MhnCIfZYe0/NXGEGo0mvPra6+jo6BDk7bFjX+CTgX6EQiFBPAJYHKGVlZV486234fF4CD5kIIOHB9Hb241gMCiIRwDnFqpQKFCq00HOyQnvW4WYTCa8cfAg3G43mcOAAwP9OPTeIQQCs4J4BHB2oexwzr6JTbZmlGg0hPetQtjnZc+el9DWKiwZ9fX1oaurC36/nzwWEZhdKMdxMBqNePmVfWCnHapptVrY7TY0PifsO9rT04POzk5JKDXQ98FJM5oOirR0c6whaY/mCJCUjP5FFvqLKiUjKRlRVpGUjKRktBqBh5Z12eCsRltdbQYrSlOtQq3CgUojntfpqRSkOBlGeS2Gi3ksyDgyb25uDqe/PpkufKdSD6zw576mkUe8B2hWq/BumQEerphMX1HIcNtpx6SzFXdLtGSez+dDb/cHmJi4hZWVlQfxJKHkiN4PKM1olvBJSzfH2pL26N8DJCUjKRlRIiBlXSnrAuvy81KtVuEdQzncAo6AKQWH3x02TDmceRwB38fExPjaHwHLlAq4dDrUK1SULb2K4WTQOhzQtW+HXMuTeT6fFx/2dGNy8re1F8q6tJRyORQce6IZ+/3haN8B1+4XwPOlNBIAJrT/448wNXV77W8vZC/vAaaFOlvhcu0CX0oX6vf5MHj4U0xPT68PoUyzvbkFbe3bwQtYuqwJ6+jRI/DeeQj30XxmlHEaG7ehpcWJEi39PhoMBHDixFfw+33rZ0a3bm3AtqYmaDQl5Fixv+Nnz5xGMBhYP0JZX5K14dl0+YZqrJRy8cK3CIWy/iUX51BPdfKfuNraOtRveQbFxfQSTCQSxpXLlxEOz2UbtrCEWixPoK7uaajVanKsItEIhn/8AdFo1t6kwhJqNpthsTyZ7vWlWiw2j9HRn3J1mxWWUNa2U1VVJai0Go/HMTZ2I1ejZGEJ1evL0s3MrBOGaktLS5iZmUEikbXHt7CEsr3JEhH70061ZDKZXrZZarrsVYUllB0DhYhkClh1PofIwhNKncU8cIU1o3kIoFL8fwKA5rH4Uygh2QAAAABJRU5ErkJggg==" class="max-h-75px" alt="" /> --}}
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-10">
								<h3>Admin Panel</h3>
								<div class="text-muted font-weight-bold">Enter your login details</div>
							</div>
                            <form method="POST" class="kt_login_signin_form" action="{{ admin_url('login/do_login') }}">
                                @csrf
								<div class="form-group mb-5">
                                    <input name="username" type="text" value="" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Username" autocomplete="off" autofocus />
                                </div>
								<div class="form-group mb-5">
                                    <input name="password" type="password" value="" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Password">
                                </div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									<div class="checkbox-inline">
										<label class="checkbox m-0 text-muted">
										<input type="checkbox" value="1" name="remember" />
										<span></span>Remember me</label>
									</div>
								</div>
								<button id="kt_login_signin_submit"  class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
							</form>

						</div>

					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>

        @section('scripts')
        <script src="{{ asset_url('libs/login-general.js', true) }}" type="text/javascript"></script>
        @endsection

		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>





