@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
</ul>
@endif

@if(!empty($message))
<div class="alert alert-{{ $message['type'] }}">{{ $message['text'] }}</div>
@endif
