<form action="{{ route('laban_process.update', $laban) }}" method="POST" role="form">
    @csrf
    @isset($laban)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    @foreach ($fields1 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($laban) ? $laban[$key.'_'.$day] : '') }}" />
    @endforeach
    
    
    <hr />
    @foreach ($fields2 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($laban->laban2) ? $laban->laban2[$key.'_'.$day] : '') }}" />
    @endforeach
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($laban) ? 'Update Laban Process' : 'Save Laban Process')
        </x-save-btn>
    </div>
</form>
