<form action="{{ route('raclette.update', $raclette) }}" method="POST" role="form">
    @csrf
    @isset($raclette)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    @foreach ($fields1 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($raclette) ? $raclette[$key.'_'.$day] : '') }}" />
    @endforeach
    
    
    <hr />
    @foreach ($fields2 as $key => $value) 
        @if ($key == 'date')
        <x-input label="{{$value}}" name="{{$key}}" type="date"
            value="{{ old($key, isset($raclette->raclette2) ? $raclette->raclette2[$key.'_'.$day] : '') }}" />
        @else       
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($raclette->raclette2) ? $raclette->raclette2[$key.'_'.$day] : '') }}" />
        @endif
    @endforeach
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($raclette) ? 'Update Raclette' : 'Save Raclette')
        </x-save-btn>
    </div>
</form>
