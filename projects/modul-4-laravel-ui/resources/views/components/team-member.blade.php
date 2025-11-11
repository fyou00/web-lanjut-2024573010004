@props(['name', 'role', 'avatar' => '👤', 'description' => '', 'theme' => 'light'])

<div class="col-md-4 mb-4">
    <div class="card {{ $theme === 'dark' ? 'bg-dark text-white border-light' : 'bg-white border' }} h-100">
        <div class="card-body text-center">
            <div class="mb-3">
                <span class="fs-1">{{ $avatar }}</span>
            </div>
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text text-muted">{{ $role }}</p>
            <p class="card-text">{{ $description }}</p>
        </div>
    </div>
</div>
