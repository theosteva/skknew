@include('layouts.app')
@include('layouts.header')
	<div id="ubea-hero" class="js-fullheight"  data-section="home">
		<div class="flexslider js-fullheight">
			<ul class="slides">
			    @foreach($sliders as $slider)
			    <li style="background-image: url('{{ asset('storage/' . $slider->image) }}');">
			   		<div class="overlay" style="background: rgba(0, 0, 0, {{ $slider->overlay_opacity }});"></div>
			   		<div class="container">
			   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h2 style="font-size: {{ $slider->title_size }}px; color: {{ $slider->text_color }};">{{ $slider->title }}</h2>
			   					@if($slider->button_text)
			   					<p>
			   						<a 
			   							href="{{ $slider->button_link }}" 
			   							class="btn"
			   							style="{{ $slider->getButtonStyle() }}"
			   							@if(Str::startsWith($slider->button_link, 'http')) target="_blank" @endif
			   						>
			   							{{ $slider->button_text }}
			   						</a>
			   					</p>
			   					@endif
			   				</div>
			   			</div>
			   		</div>
			   	</li>
			    @endforeach
		  	</ul>
	  	</div>
	</div>

	<div class="ubea-section-overflow">

		<div class="ubea-section" id="ubea-body" data-section="body">
			<div class="ubea-container">
				@if($BodyHeader)
				<div class="row">
					<div class="col-md-12">
						<div class="ubea-heading">
							<h2 class="ubea-left">{{ $BodyHeader->title }}</h2>
							<p>{{ $BodyHeader->description }}</p>
						</div>
					</div>
				</div>
				@endif
				
				<div class="row">
					@if($bodies->count() > 0)
						<div class="col-md-6">
							<div class="row">
								@foreach($bodies->take(3) as $body)
								<div class="col-md-12">
									<div class="feature-left">
										<span class="icon">
											<i class="{{ $body->icon }}"></i>
										</span>
										<div class="feature-copy">
											<h3>{{ $body->title }}</h3>
											<p>{{ $body->description }}</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								@foreach($bodies->skip(3)->take(3) as $body)
								<div class="col-md-12">
									<div class="feature-left">
										<span class="icon">
											<i class="{{ $body->icon }}"></i>
										</span>
										<div class="feature-copy">
											<h3>{{ $body->title }}</h3>
											<p>{{ $body->description }}</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					@else
						<div class="col-md-12 text-center">
							<p>No body content available.</p>
						</div>
					@endif
				</div>
			</div>
		</div>

		<div class="ubea-section" id="ubea-portfolio" data-section="portfolio">
		<div class="ubea-container">	
		@if($imageHeading)
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
					<h2>{{ $imageHeading->title }}</h2>
					<p>{{ $imageHeading->description }}</p>
				</div>
			</div>
			@endif
			<div class="row">
				@foreach($imageContents as $image)
					<div class="col-md-4">
						<a href="{{ asset('storage/' . $image->image) }}" class="ubea-card-item image-popup" title="{{ $image->title }}">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" class="img-responsive">
							</figure>
						</a>
					</div>
				@endforeach
			</div>
		</div>
        
		<div class="ubea-section" id="ubea-faq" data-section="faq">
			<div class="ubea-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
						<h2>{{ $faqHeader->title ?? 'Frequently Ask Questions' }}</h2>
						<p>{{ $faqHeader->description ?? 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident.' }}</p>
					</div>
				</div>
				<div class="row">
					@php
						$faqs = \App\Models\Faq::where('is_active', true)
							->orderBy('order')
							->get();
						$halfCount = ceil($faqs->count() / 2);
					@endphp
					
					<div class="col-md-6">
						@foreach($faqs->take($halfCount) as $faq)
						<details class="faq-item">
							<summary class="faq-question">{{ $faq->question }}</summary>
							<div class="faq-answer">
								{{ $faq->answer }}
							</div>
						</details>
						@endforeach
					</div>
					
					<div class="col-md-6">
						@foreach($faqs->skip($halfCount) as $faq)
						<details class="faq-item">
							<summary class="faq-question">{{ $faq->question }}</summary>
							<div class="faq-answer">
								{{ $faq->answer }}
							</div>
						</details>
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</div>
    
    <div id="ubea-blog" data-section="about">
		<div class="ubea-container">
			<div class="row">
				@if($about = \App\Models\About::where('is_active', true)->first())
				<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
					<h2>{{ $about->title }}</h2>
					<a href="{{ url('/kontak') }}" class="btn btn-primary">
						{{ Str::limit($about->description, 100) }}
					</a>
				</div>
				@endif
			</div>
	    </div>
    </div>
    </div>
      
@include('layouts.footer')

	<style>
		.contact-map {
			border-radius: 10px;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0,0,0,0.1);
		}

		.contact-content {
			padding: 30px;
			height: 450px;
			background: #f8f9fa;
			border-radius: 10px;
			box-shadow: 0 0 20px rgba(0,0,0,0.1);
		}

		.contact-info-box {
			margin-bottom: 30px;
		}

		.contact-info-box h3 {
			margin-bottom: 20px;
			color: #333;
			font-size: 24px;
		}

		.info-item {
			display: flex;
			align-items: center;
			margin-bottom: 15px;
		}

		.info-item i {
			font-size: 20px;
			color: #52C8FA;
			margin-right: 15px;
		}

		.info-item p {
			margin: 0;
		}

		.info-item a {
			color: inherit;
			text-decoration: none;
		}

		.info-item a:hover {
			color: #52C8FA;
		}

		.social-links h3 {
			margin-bottom: 20px;
			color: #333;
			font-size: 24px;
		}

		.social-icon {
			display: inline-block;
			width: 40px;
			height: 40px;
			line-height: 40px;
			text-align: center;
			background: #52C8FA;
			color: white;
			border-radius: 50%;
			margin-right: 10px;
			transition: all 0.3s ease;
		}

		.social-icon:hover {
			background: #333;
			color: white;
			transform: translateY(-3px);
		}
	</style>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	</body>
</html>

<style>
.faq-item {
    margin-bottom: 1rem;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.faq-question {
    padding: 1rem;
    cursor: pointer;
    background-color: #f8f9fa;
    font-weight: 500;
    list-style: none;
}

.faq-question::-webkit-details-marker {
    display: none;
}

.faq-question::after {
    content: '+';
    float: right;
    font-weight: bold;
}

details[open] .faq-question::after {
    content: '-';
}

.faq-answer {
    padding: 1rem;
    border-top: 1px solid #ddd;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
}

details[open] .faq-answer {
    max-height: 500px; /* atau sesuaikan dengan kebutuhan */
}

.ubea-heading .btn-primary {
    white-space: normal; /* Memungkinkan text untuk wrap */
    max-width: 80%; /* Membatasi lebar button */
    margin: 0 auto; /* Membuat button center */
    text-align: center;
    padding: 10px 20px;
    line-height: 1.5;
    display: inline-block;
}
</style>

<script>
document.querySelectorAll('details').forEach((detail) => {
    detail.addEventListener('toggle', (e) => {
        if (detail.open) {
            const answer = detail.querySelector('.faq-answer');
            answer.style.maxHeight = answer.scrollHeight + 'px';
        } else {
            const answer = detail.querySelector('.faq-answer');
            answer.style.maxHeight = '0';
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const scrollLinks = document.querySelectorAll('.scroll-link');
    
    scrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const headerOffset = document.querySelector('.ubea-nav').offsetHeight;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
                // Update active class
                scrollLinks.forEach(link => link.parentElement.classList.remove('active'));
                this.parentElement.classList.add('active');
            }
        });
    });
});

    
    // Deteksi scroll untuk mengaktifkan link yang sesuai
    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        const headerHeight = document.querySelector('.ubea-nav').offsetHeight;
        
        document.querySelectorAll('.ubea-section').forEach(section => {
            const sectionTop = section.offsetTop - headerHeight - 100;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                const correspondingLink = document.querySelector(`.scroll-link[href="#${sectionId}"]`);
                if (correspondingLink) {
                    scrollLinks.forEach(link => link.parentElement.classList.remove('active'));
                    correspondingLink.parentElement.classList.add('active');
                }
            }
        });
    });
});
</script>

<style>
.scroll-link {
    transition: color 0.3s ease;
}

.scroll-link.active {
    color: #FF5126 !important;
}

.scroll-link.active:after {
    width: 100% !important;
}

html {
    scroll-behavior: smooth;
}
</style>

<style>
.menu-1 ul li.active a {
    color: #FF5126;
}

.menu-1 ul li.active a:after {
    width: 100%;
}
</style>

