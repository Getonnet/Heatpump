<div class="card">
    <!-- Card header -->
    @if(isset($title))
    <div class="card-header">
        <h3 class="mb-0">{{ $title }}</h3>
        @if(isset($subtitle))
            <p class="text-sm mb-0">
                {{ $subtitle }}
            </p>
        @endif
    </div>
    @endif
    <div class="table-responsive py-4">
        {{ $slot }}
    </div>
</div>

