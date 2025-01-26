<form action="{{ route('tomme.update', $tomme) }}" method="POST" role="form">
    @csrf
    @isset($tomme)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    @foreach ($fields1 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($tomme) ? $tomme[$key.'_'.$day] : '') }}" />
    @endforeach
    
    @foreach ($fields2 as $key => $value) 
        @if ($key == 'date')
        <x-input label="{{$value}}" name="{{$key}}" type="date"
            value="{{ old($key, isset($tomme->tomme2) ? $tomme->tomme2[$key.'_'.$day] : '') }}" />
        @else       
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($tomme->tomme2) ? $tomme->tomme2[$key.'_'.$day] : '') }}" />
        @endif
    @endforeach
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($tomme) ? 'Update Tomme' : 'Save Tomme')
        </x-save-btn>
    </div>
</form>
