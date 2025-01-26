<form action="{{ route('comte.update', $comte) }}" method="POST" role="form">
    @csrf
    @isset($comte)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    @foreach ($fields1 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($comte) ? $comte[$key.'_'.$day] : '') }}" />
    @endforeach
    
    
    <hr />
    @foreach ($fields2 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($comte->comte2) ? $comte->comte2[$key.'_'.$day] : '') }}" />
    @endforeach
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($comte) ? 'Update Le Comte & La Comtesse' : 'Save Le Comte & La Comtesse')
        </x-save-btn>
    </div>
</form>
