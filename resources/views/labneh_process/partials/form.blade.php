<form action="{{ route('labneh_process.update', $labneh) }}" method="POST" role="form">
    @csrf
    @isset($labneh)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    @foreach ($fields1 as $key => $value)        
        @if ($key == 'date_off_bag')
        <x-input label="{{$value}}" name="{{$key}}" type="date"
            value="{{ old($key, isset($labneh) ? $labneh[$key.'_'.$day] : '') }}" />
        @else
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($labneh) ? $labneh[$key.'_'.$day] : '') }}" />
        @endif
    @endforeach
    
    
    <hr />
    @foreach ($fields2 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($labneh->labneh2) ? $labneh->labneh2[$key.'_'.$day] : '') }}" />
    @endforeach
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($labneh) ? 'Update Labneh Process' : 'Save Labneh Process')
        </x-save-btn>
    </div>
</form>
