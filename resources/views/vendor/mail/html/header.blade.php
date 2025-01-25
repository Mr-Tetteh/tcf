@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <img src="../../../images/309372872_460971846059341_4824700090279169467_n.jpg"
             class="w-20 h-20 fill-current text-gray-500 rounded-full" alt="tcf logo">
    @else
{{ $slot }}
@endif
</a>
</td>
</tr>
