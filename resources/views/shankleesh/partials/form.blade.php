<form action="{{ route('shankleesh.update', $shankleesh) }}" method="POST" role="form">
    @csrf
    @isset($shankleesh)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    @foreach ($fields1 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($shankleesh) ? $shankleesh[$key.'_'.$day] : '') }}" />
    @endforeach
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($shankleesh) ? 'Update Shankleesh Process' : 'Save Shankleesh Process')
        </x-save-btn>
    </div>
</form>
