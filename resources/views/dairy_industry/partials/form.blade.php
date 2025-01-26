<form action="{{ route('dairy_industry.update', $dairy) }}" method="POST" role="form">
    @csrf
    @isset($dairy)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <input type="hidden" name="day" value="{{$day}}" />
        <label for="qty" class="form-label">@lang('Quantity used')</label>
        <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty"
            value="{{ old('qty', isset($dairy) ? $dairy['qty_'.$day] : '') }}">
        @error('qty')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <x-number-input label="Time on fire in minutes" name="time_fire"
        value="{{ old('time_fire', isset($dairy) ? $dairy['time_fire_'.$day] : '') }}" />
    
    <x-input label="Detail 1" name="detail_1" type="detail_1"
                value="{{ old('detail_1', isset($dairy) ? $dairy['detail_1_'.$day] : '') }}" />
    
    <x-input label="Detail 2" name="detail_2" type="detail_2"
                value="{{ old('detail_2', isset($dairy) ? $dairy['detail_2_'.$day] : '') }}" />

    <x-input label="Final Quantity Cerak" name="cerak_qty"
        value="{{ old('cerak_qty', isset($dairy) ? $dairy['cerak_qty_'.$day] : '') }}" />
        
    <x-input label="Final Quantity Double Cream" name="cream_qty"
        value="{{ old('cream_qty', isset($dairy) ? $dairy['cream_qty_'.$day] : '') }}" />

    <x-input label="Final Quantity Ricotta" name="ricotta_qty"
        value="{{ old('ricotta_qty', isset($dairy) ? $dairy['ricotta_qty_'.$day] : '') }}" />
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($dairy) ? 'Update Cerak, Double Cream & Ricotta Process' : 'Save Cerak, Double Cream & Ricotta Process')
        </x-save-btn>
    </div>
</form>
