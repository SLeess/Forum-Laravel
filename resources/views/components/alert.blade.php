<div class="alert">
    @if($errors->any())
        @foreach ($errors->all() as $erro)
            <p class="text-center">{{ $erro }}</p>
        @endforeach
    @endif
</div>
