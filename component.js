// loading
console.log('component.js loaded — ' + new Date().toISOString());
class Tloading extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <div id="loading">
                <div class="spinner"></div>
            </div>
        `;
    }
}
customElements.define("t-loading", Tloading);
// header
class Tnavbar extends HTMLElement {
    connectedCallback() {
        const active = this.getAttribute('active') || '';
        const aClass = (name) => {
            if (active === name) {
                return 'nav-link text-info active';
            }
            return 'nav-link text-white';
        };

        this.innerHTML = `
            <nav class="navbar navbar-expand-md sticky-top navbar-dark py-3" style="background-color: #0D1B2A;">
                <div class="container-fluid px-3">
                    
                    <a href="/" class="navbar-brand d-inline-flex align-items-center text-decoration-none">
                        <img src="../foto/logo.png" alt="logo" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                        <h3 class="ms-2 text-white fs-4 mb-0">Nusaman Tech</h3>
                    </a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        
                        <div class="d-flex me-auto d-none d-md-block"></div> 
                        
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a href="index.html" class="${aClass('class-beranda')}">Beranda</a></li>
                            <li class="nav-item"><a href="about.html" class="${aClass('class-tentang')}">Tentang</a></li>
                            <li class="nav-item"><a href="service.html" class="${aClass('class-layanan')}">Layanan</a></li>
                            <li class="nav-item"><a href="project.html" class="${aClass('class-projek')}">Projek</a></li>
                            <li class="nav-item"><a href="tool.html" class="${aClass('class-alat')}">Alat & Teknologi</a></li>
                            <li class="nav-item"><a href="contact.html" class="${aClass('class-kontak')}">Kontak</a></li>
                        </ul>
                        
                        <div class="d-flex ms-auto"> 
                            <a href="index.html#form-pemesanan" class="btn btn-outline-light me-2">Order Sekarang</a> 
                        </div>
                    </div>
                </div>
            </nav>
        `;
    }
}
customElements.define("t-nav", Tnavbar);
// hero section
class Thero extends HTMLElement {
    connectedCallback() {
        const page = this.getAttribute('page') || '';
        const title = this.getAttribute('title') || '';
        const description = this.getAttribute('description') || '';
        const kode = this.getAttribute('kode') || '';
        this.innerHTML = `
            <section class="mb-5" style="background-color: #1B263B;">
                <div class="container py-5 text-center">
                    <p class="text-white" style="font-size: 18px; margin-bottom: 0px;">${page}</p>
                    <h1 class="text-white pb-2" style="font-size: 48px;"><b>${title}</b></h1>
                    <p class="text-white" style="font-size: 18px;">${description}</p>
                    ${kode}
                </div>
            </section>
        `;
    }
}
customElements.define("t-hero", Thero);
// stats-counter
class TstatsCounter extends HTMLElement {
    connectedCallback() {
        const stats = this.innerHTML;
        
        this.innerHTML = `
            <section class="my-5 py-5" style="background-color: #F8F9FA;">
                <div class="container">
                    <div class="row text-center g-4">
                        ${stats}
                    </div>
                </div>
            </section>
        `;
    }
}
customElements.define("t-stats-counter", TstatsCounter);
// feature-list
class TfeatureList extends HTMLElement {
    connectedCallback() {
        const title = this.getAttribute('title') || 'Fitur Unggulan';
        
        // Asumsi konten fitur dimasukkan sebagai HTML di dalam tag <t-feature-list>
        const features = this.innerHTML; 

        this.innerHTML = `
            <section class="container my-5 py-3">
                <h2 class="text-center mb-5 display-6 fw-bold">${title}</h2>
                <div class="row g-4 justify-content-center">
                    ${features}
                </div>
            </section>
        `;
    }
}
customElements.define("t-feature-list", TfeatureList);
// card
class Tcard extends HTMLElement {
    connectedCallback() {
        const cardClass = this.getAttribute('cardClass') || '';
        const biClass = this.getAttribute('biClass') || '';
        const title = this.getAttribute('title') || '';
        const description = this.getAttribute('description') || '';
        this.innerHTML = `
                <div class="row justify-content-center h-100" style="margin-left: 1px; margin-right: 1px;">
                    <div class="card h-100 shadow-sm ${cardClass}" style="padding: 30px; border: none;">
                        <div class="p-2 bg-light rounded-3 mb-3 d-inline-flex">
                            <i class="bi bi-${biClass} fs-3 text-primary"></i>
                        </div>
                        <h2 style="font-size: 1.75rem;">${title}</h2>
                        <p style="font-size:1.1rem;">${description}</p>
                    </div>
                </div>
        `;
    }
}
customElements.define("t-card", Tcard);
// cta
class Tcta extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <section class="mt-5" style="background-color: #1B263B;">
                <div class="container py-5 text-center">
                    <h1 class="text-white">Tunggu Apa Lagi?</h1>
                    <p class="text-white" style="font-size: 18px;">Pesan website sesuai dengan tema yang kamu inginkan, dapat dibatalkan kapan saja.
                    </p>
                    <a href="index.html#form-pemesanan" class="btn text-white btn-custom-primary">Pesan Sekarang!</a>
                </div>
            </section>
        `;
    }
}
customElements.define('t-cta', Tcta);
// section
class TSection extends HTMLElement {
    connectedCallback() {
        const title = this.getAttribute("title") || "Judul Belum Ditentukan";
        const description = this.getAttribute("description") || "Deskripsi Belum Ditentukan";
        const link = this.getAttribute("link") || "#";
        const linkText = this.getAttribute("linkText") || "Baca Lebih Lanjut";
        const img = this.getAttribute("img") || "placeholder.jpg";
        const reverse = this.hasAttribute('reverse');

        // Menggunakan struktur Bootstrap yang benar (row dan col)
        this.innerHTML = `
            <section class="my-5"> 
                <div class="container">
                    <div class="row g-5 align-items-center ${reverse ? 'flex-row-reverse' : ''}">
                        
                        <div class="col-12 col-md-6">
                            <h2 class="display-5 fw-bold">${title}</h2> 
                            <p style="font-size: 18px;">${description}</p>
                            
                            <a class="btn text-white btn-custom-primary mt-3 py-2 px-4" href="about.html">
                                ${linkText} <i class="ms-2 bi bi-arrow-right"></i>
                            </a>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <img src="${img}" class="img-fluid rounded shadow-lg" alt="${title} illustrasi" />
                        </div>
                    </div>
                </div>
            </section>
        `;
    }
}
customElements.define("t-section", TSection);
// footer
class Tfooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <footer id="footer" class="text-white" style="background-color: #0D1B2A;">
                <div class="container py-4">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-4 d-flex flex-column align-items-start mb-3 mb-md-0">
                            <h5><b>Nusaman Tech Solutions</b></h5>
                            <p>Menginovasi Masa Depan Digital Indonesia!</p>
                        </div>
                        <div class="col-md-4 d-flex flex-column align-items-start mb-3 mb-md-0">
                            <h5><b>Kontak</b></h5>
                            <div class="row d-flex my-1">
                                <img src="../foto/github.svg" class="col-md-3"/>
                                <img src="../foto/linkedin.svg" class="col-md-3"/>
                                <img src="../foto/x.svg" class="col-md-3"/>
                                <img src="../foto/youtube.svg" class="col-md-3"/>
                            </div>
                            <ul class="list-unstyled">
                                <li>Jl. Industri No. 123, Malang</li>
                                <li>Email: info@nusaman.com</li>
                                <li>Telp: (021) 111-2233</li>
                            </ul>
                        </div>
                        <div class="col-md-4 d-flex flex-column align-items-start">
                            <h5><b>Tautan Cepat</b></h5>
                            <ul class="list-unstyled">
                                <li><a href="index.html" class="text-white text-decoration-none">Beranda</a></li>
                                <li><a href="about.html" class="text-white text-decoration-none">Tentang Kami</a></li>
                                <li><a href="service.html" class="text-white text-decoration-none">Layanan</a></li>
                                <li><a href="contact.html" class="text-white text-decoration-none">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr class="border-white mt-4">
                    <p class="text-center mb-0">© 2025 Nusaman Tech Solutions. All rights reserved.</p>
                </div>
            </footer>
        `;
    }
}
customElements.define("t-footer", Tfooter);