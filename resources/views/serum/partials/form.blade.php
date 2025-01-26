<form action="{{ route('serum.update', $serum) }}" method="POST" role="form">
    @csrf
    @isset($serum)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    @foreach ($fields1 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($serum) ? $serum[$key.'_'.$day] : '') }}" />
    @endforeach
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($serum) ? 'Update Serum based Dairy' : 'Save Serum based Dairy')
        </x-save-btn>
    </div>
</form>
