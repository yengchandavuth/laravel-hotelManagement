<div class="container-xxl py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-primary text-uppercase fw-bold">Our Services</h6>
            <h1 class="mb-0">Explore Our <span class="text-primary">Services</span></h1>
        </div>

        <!-- Services Grid -->
        <div class="row g-4">
            @php
                $services = [
                    ['icon' => 'fa-hotel', 'title' => 'Rooms & Apartments', 'desc' => 'Comfortable and luxurious rooms designed for your perfect stay.'],
                    ['icon' => 'fa-utensils', 'title' => 'Food & Restaurant', 'desc' => 'Delicious cuisines and fine dining experiences.'],
                    ['icon' => 'fa-spa', 'title' => 'Spa & Fitness', 'desc' => 'Relax, rejuvenate, and stay fit during your stay.'],
                    ['icon' => 'fa-swimmer', 'title' => 'Sports & Gaming', 'desc' => 'Fun activities and games for everyone.'],
                    ['icon' => 'fa-glass-cheers', 'title' => 'Event & Party', 'desc' => 'Celebrate special occasions with style.'],
                    ['icon' => 'fa-dumbbell', 'title' => 'Gym & Yoga', 'desc' => 'Stay active and healthy with our facilities.'],
                ];
            @endphp

            @foreach($services as $index => $service)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 * ($index + 1) }}s">
                    <a class="service-item d-block text-decoration-none rounded shadow-sm p-4 h-100 border border-light hover-shadow" href="#">
                        <div class="service-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fa {{ $service['icon'] }} fa-2x"></i>
                        </div>
                        <h5 class="mb-2 text-dark">{{ $service['title'] }}</h5>
                        <p class="text-muted mb-0">{{ $service['desc'] }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Custom CSS for hover -->
<style>
    .service-item:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        border-color: #0d6efd !important;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
