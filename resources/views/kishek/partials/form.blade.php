<form action="{{ route('kishek.update', $kishek) }}" method="POST" role="form">
    @csrf
    @isset($kishek)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    <x-input label="Qty of laban in kg" name="laban_qty"
                value="{{ old('laban_qty', isset($kishek) ? $kishek['kishek_'.$day]['laban_qty'] : '') }}" />

    <x-input label="Groats" name="groats"
        value="{{ old('groats', isset($kishek) ? $kishek['kishek_'.$day]['groats'] : '') }}" />
        
    <x-input label="Salt" name="salt"
        value="{{ old('salt', isset($kishek) ? $kishek['kishek_'.$day]['salt'] : '') }}" />

    <x-input label="Current weight" name="current_weight"
        value="{{ old('current_weight', isset($kishek) ? $kishek['kishek_'.$day]['current_weight'] : '') }}" />
    
    <hr style="height: 10px; background-color: black;"/>
    <x-input label="Breaking date" name="breaking_date" type="date"
                value="{{ old('breaking_date', isset($kishek) ? $kishek['kishek_'.$day]['breaking_date'] : '') }}" />

    <x-input label="Cost of breaking" name="cost_of_breaking"
        value="{{ old('cost_of_breaking', isset($kishek) ? $kishek['kishek_'.$day]['cost_of_breaking'] : '') }}" />
    
    <hr style="height: 10px; background-color: black;"/>
    @for ($i = 1; $i <= 9; $i++)
        <x-input label="{{$i}} - Labneh Added - Date" name="labneh_added_{{$i}}" type="date"
                    value="{{ old('labneh_added_'.$i, isset($kishek) ? $kishek['kishek_'.$day]['labneh_added_'.$i] : '') }}" />

        <x-input label="Amount of Labneh Added	" name="labneh_amount_{{$i}}"
            value="{{ old('labneh_amount_'.$i, isset($kishek) ? $kishek['kishek_'.$day]['labneh_amount_'.$i] : '') }}" />

        <x-input label="Current weight" name="current_weight_{{$i}}"
            value="{{ old('current_weight_'.$i, isset($kishek) ? $kishek['kishek_'.$day]['current_weight_'.$i] : '') }}" />
        <hr style="height: 10px; background-color: black;"/>
    @endfor
    <x-input label="Final Quantity" name="final_qty"
        value="{{ old('final_qty', isset($kishek) ? $kishek['kishek_'.$day]['final_qty'] : '') }}" />
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($kishek) ? 'Update Kishek' : 'Save Kishek')
        </x-save-btn>
    </div>
</form>
