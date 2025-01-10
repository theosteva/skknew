@include('layouts.app')		
	<div class="ubea-loader"></div>
	
	<div id="page">
				<nav class="ubea-nav" role="navigation">
			<div class="ubea-container">
				<div class="row">
					<div class="col-sm-2 col-xs-12">
						<div id="ubea-logo">
							<a class="navbar-brand" href="{{ url('/') }}">
								<h3 class="images-logo-place">
									<img src="{{ asset('images/logo/logo-skk.webp') }}" alt="PT Sakti Kinerja Kolaborasindo" class="images-logo-header"> 
									<img src="{{ asset('images/CBQA-ISO-27001.png') }}" alt="ISO 27001" class="images-logo-iso">
								</h3>
							</a>
						</div>
					</div>
					<div class="col-xs-10 text-right menu-1 main-nav">
					<ul>
 		   	<li class="active"><a href="/" class="external">Beranda</a></li>
  			<li><a href="#ubea-body" class="scroll-link">Tentang Kami</a></li>
  			<li><a href="#ubea-portfolio" class="scroll-link">Daftar Produk</a></li>
 			<li><a href="/mitra" class="external">Mitra</a></li>	
 		  	<li><a href="/kontak" class="external">Kontak</a></li>
		</ul>

				</div>
			</div>
			
		</div>
	</nav>

	<style>
		.images-logo-place {
			display: flex;
			align-items: center;
			gap: 10px;
			margin: 0;
			padding-top: 10px;
		}

		.images-logo-header {
			height: 48px;
			width: auto;
		}

		.navbar-brand {
			padding: 0;
			display: block;
		}

		#ubea-logo {
			padding: 10px 0;
		}

		.menu-1 {
			padding-top: 15px;
		}
	</style>