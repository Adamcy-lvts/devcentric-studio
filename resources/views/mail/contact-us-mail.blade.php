<x-mail::message>
Message from {{$name}}

{{$message}}

{{$email}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
