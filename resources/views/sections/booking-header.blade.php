<div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="bg-white shadow" style="padding: 35px;">
            <h3>Check Booking Availability</h3>
            <form class="row g-2" method="post" action="{{ route('search') }}">
                @csrf
                <div class="col-md-10">
                    <div class="row g-2">
                        <!-- Check-in Date -->
                        <div class="col-md-6">
                            <input type="date" 
                                   name="check_in" 
                                   class="form-control @error('check_in') is-invalid @enderror"
                                   value="{{ old('check_in', $fields['check_in'] ?? '') }}" 
                                   required>
                            @error('check_in')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Check-out Date -->
                        <div class="col-md-6">
                            <input type="date" 
                                   name="check_out" 
                                   class="form-control @error('check_out') is-invalid @enderror"
                                   value="{{ old('check_out', $fields['check_out'] ?? '') }}" 
                                   required>
                            @error('check_out')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-md-2 mt-3">
                    <button type="submit" class="btn btn-primary w-100">Check</button>
                </div>
            </form>
        </div>
    </div>
</div>
