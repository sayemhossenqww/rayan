<form action="{{ route('cheese_process.update', $cheese) }}" method="POST" role="form">
    @csrf
    @isset($cheese)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <input type="hidden" name="day" value="{{$day}}" />
        <label for="qty" class="form-label">@lang('Quantity used')</label>
        <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty"
            value="{{ old('qty', isset($cheese) ? $cheese['qty_'.$day] : '') }}">
        @error('qty')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <x-input label="Milk Analyzer Test" name="milk_analyzer"
                value="{{ old('milk_analyzer', isset($cheese) ? $cheese['milk_analyzer_'.$day] : '') }}" />

    <x-input label="On fire" name="time_on"
        value="{{ old('time_on', isset($cheese) ? $cheese['time_on_'.$day] : '') }}" />
        
    <x-input label="Off of fire" name="time_off"
        value="{{ old('time_off', isset($cheese) ? $cheese['time_off_'.$day] : '') }}" />

    <x-input label="Cooled down" name="cooled_down"
        value="{{ old('cooled_down', isset($cheese) ? $cheese['cooled_down_'.$day] : '') }}" />
    
    <x-input label="Rennet quantity" name="rennet_qty"
                value="{{ old('rennet_qty', isset($cheese) ? $cheese['rennet_qty_'.$day] : '') }}" />

    <x-input label="Added" name="added"
        value="{{ old('added', isset($cheese) ? $cheese['added_'.$day] : '') }}" />
        
    <x-input label="Fermented" name="fermented"
        value="{{ old('fermented', isset($cheese) ? $cheese['fermented_'.$day] : '') }}" />

    <x-input label="Cut" name="cut"
        value="{{ old('cut', isset($cheese) ? $cheese['cut_'.$day] : '') }}" />
    
    <x-input label="Quantity of Balady cheese" name="balady_cheese_qty"
        value="{{ old('balady_cheese_qty', isset($cheese) ? $cheese['balady_cheese_qty_'.$day] : '') }}" />
    
    <hr />
    <x-input label="Put in Mold" name="put_in_mold"
        value="{{ old('put_in_mold', isset($cheese->cheese2) ? $cheese->cheese2['put_in_mold_'.$day] : '') }}" />
    
    <x-input label="Boiling started 1" name="boiling_started_1"
                value="{{ old('boiling_started_1', isset($cheese->cheese2) ? $cheese->cheese2['boiling_started_1_'.$day] : '') }}" />

    <x-input label="Boiling started 2" name="boiling_started_2"
        value="{{ old('boiling_started_2', isset($cheese->cheese2) ? $cheese->cheese2['boiling_started_2_'.$day] : '') }}" />
        
    <x-input label="Quantity of Halloum cheese" name="halloum_cheese_qty"
        value="{{ old('halloum_cheese_qty', isset($cheese->cheese2) ? $cheese->cheese2['halloum_cheese_qty_'.$day] : '') }}" />

    <x-input label="In fridge" name="in_fridge"
        value="{{ old('in_fridge', isset($cheese->cheese2) ? $cheese->cheese2['in_fridge_'.$day] : '') }}" />
    
    <x-input label="Quantity of Akkwai cheese" name="akkwai_cheese_qty"
        value="{{ old('akkwai_cheese_qty', isset($cheese->cheese2) ? $cheese->cheese2['akkwai_cheese_qty_'.$day] : '') }}" />
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($cheese) ? 'Update Cheese Process' : 'Save Cheese Process')
        </x-save-btn>
    </div>
</form>
