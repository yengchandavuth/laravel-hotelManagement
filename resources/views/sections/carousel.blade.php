<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Luxury Hotel 1">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3 text-center" style="max-width: 700px;">
                        <h6 class="text-primary text-uppercase mb-3 fw-bold animated slideInDown">Luxury Living</h6>
                        <h1 class="display-4 fw-bold mb-4 text-white animated slideInDown">Discover a Brand Luxurious Hotel</h1>
                        <a href="{{ route('rooms.index') }}" class="btn btn-primary btn-lg animated slideInLeft">Book a Room</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Luxury Hotel 2">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3 text-center" style="max-width: 700px;">
                        <h6 class="text-primary text-uppercase mb-3 fw-bold animated slideInDown">Luxury Living</h6>
                        <h1 class="display-4 fw-bold mb-4 text-white animated slideInDown">Experience Comfort & Elegance</h1>
                        <a href="{{ route('rooms.index') }}" class="btn btn-primary btn-lg animated slideInLeft">Book a Room</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
