@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Crossfire Tournament')
<img src="{{ asset('img/logo.png') }}" class="logo" alt="Crossfire Tournaments Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
