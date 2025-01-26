<form action="{{ route('gouda_regular.update', $regular) }}" method="POST" role="form">
    @csrf
    @isset($regular)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    <x-input label="Quantity of Milk" name="qty"
                value="{{ old('qty', isset($regular) ? $regular['qty_'.$day] : '') }}" />

    <x-input label="On fire" name="time_on"
        value="{{ old('time_on', isset($regular) ? $regular['time_on_'.$day] : '') }}" />
        
    <x-input label="Off of fire" name="time_off"
        value="{{ old('time_off', isset($regular) ? $regular['time_off_'.$day] : '') }}" />

    <x-input label="Cooled down" name="cooled_down"
        value="{{ old('cooled_down', isset($regular) ? $regular['cooled_down_'.$day] : '') }}" />
    
    <x-input label="Ferment Added" name="ferment_added"
                value="{{ old('ferment_added', isset($regular) ? $regular['ferment_added_'.$day] : '') }}" />

    <x-input label="Quantity of Ferment added" name="ferment_added_qty"
        value="{{ old('ferment_added_qty', isset($regular) ? $regular['ferment_added_qty_'.$day] : '') }}" />
        
    <x-input label="Pressured" name="pressured"
        value="{{ old('pressured', isset($regular) ? $regular['pressured_'.$day] : '') }}" />

    <x-input label="Temperature" name="temperature"
        value="{{ old('temperature', isset($regular) ? $regular['temperature_'.$day] : '') }}" />
    
    <x-input label="On fire & Cut" name="fire_cut"
        value="{{ old('fire_cut', isset($regular) ? $regular['fire_cut_'.$day] : '') }}" />
    
    <x-input label="Water Temperature" name="water_temperature"
        value="{{ old('water_temperature', isset($regular) ? $regular['water_temperature_'.$day] : '') }}" />
        
    <x-input label="Serum removed" name="serum_removed"
        value="{{ old('serum_removed', isset($regular) ? $regular['serum_removed_'.$day] : '') }}" />
    
    <hr />

    <x-input label="Put in water" name="put_in_water"
        value="{{ old('put_in_water', isset($regular->regular2) ? $regular->regular2['put_in_water_'.$day] : '') }}" />
        
    <x-input label="In mold" name="in_mold"
        value="{{ old('in_mold', isset($regular->regular2) ? $regular->regular2['in_mold_'.$day] : '') }}" />

    <x-input label="Date" name="date" type="date"
        value="{{ old('date', isset($regular->regular2) ? $regular->regular2['date_'.$day] : '') }}" />
    
    <x-input label="Water" name="water"
        value="{{ old('water', isset($regular->regular2) ? $regular->regular2['water_'.$day] : '') }}" />
    
    <x-input label="Salt" name="salt"
        value="{{ old('salt', isset($regular->regular2) ? $regular->regular2['salt_'.$day] : '') }}" />

    <x-input label="Quantity of l’ancienne" name="lancienne_qty"
        value="{{ old('lancienne_qty', isset($regular->regular2) ? $regular->regular2['lancienne_qty_'.$day] : '') }}" />

    <x-input label="Quantity of regular" name="reqular_qty"
        value="{{ old('reqular_qty', isset($regular->regular2) ? $regular->regular2['reqular_qty_'.$day] : '') }}" />
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($regular) ? 'Update Gouda a l’ancienne & regular' : 'Save Gouda a l’ancienne & regular')
        </x-save-btn>
    </div>
</form>
