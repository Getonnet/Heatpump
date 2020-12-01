<div class="card">

    @if(isset($title))
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">{{ $title }}</h3>
            @if(isset($subtitle))
                <p class="text-sm mb-0">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
        <!-- /Card header -->
    @endif
    <!-- Card body -->
    <div class="card-body">
        {{ $slot }}
    </div>
</div>

