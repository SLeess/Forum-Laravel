@csrf()
@yield('method-except-POST')
{{-- <input type="text" value="{{ csrf_token() }}" name="_token" hidden> --}}
<div class="row mb-3">
    <label for="inputAssunto3" class="col-sm-4 col-form-label">Título do assunto</label>
    <div class="col-sm-8">
        <input type="text" placeholder="Assunto do suporte" name="subject" class="form-control"/ value="{{ $support->subject ?? old('subject') }}">
    </div>
</div>
<div class="row mb-3">
    <label for="inputBody3" class="col-sm-4 col-form-label">Descrição do Suporte</label>
    <div class="col-sm-8">
        <textarea name="body" class="form-control" cols="5" rows="10" placeholder="Descrição">{{ $support->body ?? old('body') }}</textarea>
    </div>
</div>
<button type="submit" class="btn btn-primary">@yield('action') Suporte</button>
