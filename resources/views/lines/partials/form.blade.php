<form action="{{ isset($line) ? route('lines.update', $line) : route('lines.store') }}" method="POST"
    enctype="multipart/form-data" role="form">
    @csrf
    @isset($line)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="location" class="form-label">@lang('Location')</label>
        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location"
            value="{{ old('location', isset($line) ? $line->location : '') }}">
        @error('location')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="zoom" class="form-label">@lang('Zoom')</label>
        <input type="text" name="zoom" class="form-control @error('zoom') is-invalid @enderror" id="zoom"
            value="{{ old('zoom', isset($line) ? $line->zoom : '') }}">
        @error('zoom')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="customer_name" class="form-label">@lang('Customer Name')</label>
        <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name"
            value="{{ old('customer_name', isset($line) ? $line->customer_name : '') }}">
        @error('customer_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <x-save-btn>
            @lang('Save Line')
        </x-save-btn>
    </div>
</form>

