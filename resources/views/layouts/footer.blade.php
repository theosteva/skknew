@include('layouts.app')
<footer id="ubea-footer" role="contentinfo">
    <div class="ubea-container">
        <div class="row footer-content">
            <div class="col-md-4">
                <div class="footer-info">
                    <h3>Tentang Kami</h3>
                    <p>Kami berkomitmen untuk memberikan layanan terbaik dan solusi inovatif untuk setiap kebutuhan Anda.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-contact">
                    <h3>Kontak</h3>
                    <p><i class="icon-location-pin"></i> {{ $contact->address ?? 'Jl. Contoh No. 123, Jakarta' }}</p>
                    <p><i class="icon-phone"></i> {{ $contact->phone ?? '+62 123 456 789' }}</p>
                    <p><i class="icon-envelope"></i> {{ $contact->email ?? 'info@example.com' }}</p>
                </div>
            </div>
        </div>
        
        <div class="row copyright">
            <div class="col-md-6">
                <p class="pull-left">
                    <small class="block">&copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</small> 
                </p>
            </div>
            <div class="col-md-6">
                <ul class="ubea-social-icons pull-right">
                    @foreach(\App\Models\SocialMedia::where('is_active', true)->orderBy('order')->get() as $social)
                        <li>
                            <a href="{{ $social->url }}" target="_blank">
                                <i class="{{ $social->icon }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>

<style>
#ubea-footer {
    background: #00334e;
    padding: 50px 0 20px;
    color: #fff;
}

.footer-content {
    margin-bottom: 30px;
}

.footer-info, .footer-contact, .footer-social {
    padding: 0 20px;
}

.footer-info h3, .footer-contact h3, .footer-social h3 {
    color: #fff;
    font-size: 20px;
    margin-bottom: 20px;
}

.footer-contact p {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
}

.footer-contact i {
    color: #fff;
    margin-right: 10px;
    font-size: 16px;
}

.ubea-social-icons {
    padding: 0;
    margin: 0;
    list-style: none;
    display: flex;
    justify-content: flex-end;
}

.ubea-social-icons li {
    display: inline-block;
    margin-left: 10px;
}

.ubea-social-icons li:first-child {
    margin-left: 0;
}

.ubea-social-icons li a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    background: #fff;
    color: #00334e;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.ubea-social-icons li a:hover {
    background: #333;
    color: #fff;
    transform: translateY(-3px);
}

.copyright {
    border-top: 1px solid rgba(255,255,255,0.2);
    padding-top: 20px;
    display: flex;
    align-items: center;
}

.copyright small {
    color: #fff;
    margin: 0;
}
</style>