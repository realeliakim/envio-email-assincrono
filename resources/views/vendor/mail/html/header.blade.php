<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.beedelivery.com.br/site-v3/img/logo_grey.png" class="logo" alt="Bee">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
