<form action="{{ isset($cheese) ? route('cheeses.update', $cheese) : route('cheeses.store') }}" method="POST"
    enctype="multipart/form-data" role="form">
    @csrf
    @isset($cheese)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="name" class="form-label">@lang('Cheese and Labneh Name')</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
            value="{{ old('name', isset($cheese) ? $cheese->name : '') }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <x-number-input label="Order" name="order"
        value="{{ old('order', isset($cheese) ? $cheese->order : '') }}" />
    
    <x-input label="Manufacturing Date" name="manufacturing_date" type="date"
                value="{{ old('manufacturing_date', isset($cheese) ? $cheese->manufacturing_date : '') }}" />
    
    <x-number-input label="Evaporation Hours" name="evaporation_hours"
                value="{{ old('evaporation_hours', isset($cheese) ? $cheese->evaporation_hours : '') }}" />

    <x-input label="Quantity" name="quantity"
        value="{{ old('quantity', isset($cheese) ? $cheese->quantity : '') }}" />
        
    <x-input label="Unit" name="unit"
        value="{{ old('unit', isset($cheese) ? $cheese->unit : '') }}" />

    <div class="mb-3">
        <x-save-btn>
            @lang(isset($cheese) ? 'Update Cheese and Labneh' : 'Save Cheese and Labneh')
        </x-save-btn>
    </div>
</form>
