@include('layouts.app')
@include('layouts.header')

<div class="ubea-section" id="ubea-contact">
    <div class="ubea-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center ubea-heading">
                <h2>Hubungi Kami</h2>
                <p>Kami siap membantu Anda. Silakan hubungi kami melalui form di bawah ini atau melalui kontak yang tersedia.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="contact-info-box">
                    <h3>Informasi Kontak</h3>
                    <div class="contact-detail">
                        <div class="info-item">
                            <i class="icon-location-pin"></i>
                            <div>
                                <h4>Alamat</h4>
                                <p>{{ $contact->address ?? 'Jl. Contoh No. 123, Jakarta' }}</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <i class="icon-phone"></i>
                            <div>
                                <h4>Telepon</h4>
                                <p><a href="tel:{{ $contact->phone ?? '+62123456789' }}">{{ $contact->phone ?? '+62 123 456 789' }}</a></p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <i class="icon-envelope"></i>
                            <div>
                                <h4>Email</h4>
                                <p><a href="mailto:{{ $contact->email ?? 'info@example.com' }}">{{ $contact->email ?? 'info@example.com' }}</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links mt-4">
                        <h3>Media Sosial</h3>
                        <div class="social-icons">
                            <a href="{{ $contact->facebook ?? '#' }}" class="social-icon"><i class="icon-facebook"></i></a>
                            <a href="{{ $contact->instagram ?? '#' }}" class="social-icon"><i class="icon-instagram"></i></a>
                            <a href="{{ $contact->twitter ?? '#' }}" class="social-icon"><i class="icon-twitter"></i></a>
                            <a href="{{ $contact->linkedin ?? '#' }}" class="social-icon"><i class="icon-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="tel" name="phone" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Subjek</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea name="message" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
#ubea-contact {
    padding: 7em 0;
    background: #f8f9fa;
}

.contact-info-box {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.info-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 25px;
}

.info-item i {
    font-size: 24px;
    color: #00334e;
    margin-right: 15px;
    margin-top: 5px;
}

.info-item h4 {
    margin: 0 0 5px 0;
    font-size: 16px;
    font-weight: 600;
}

.info-item p {
    margin: 0;
    color: #666;
}

.info-item a {
    color: inherit;
    text-decoration: none;
}

.social-links {
    margin-top: 30px;
}

.social-icons {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #00334e;
    color: white;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.social-icon:hover {
    background: #FF5126;
    transform: translateY(-3px);
}

.contact-form {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #00334e;
    outline: none;
}

.btn-primary {
    background: #00334e;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #FF5126;
    transform: translateY(-2px);
}
</style>

@include('layouts.footer')
@