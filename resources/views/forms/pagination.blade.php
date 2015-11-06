<!-- This rendering can also be use but not for groupby querys - need to find out more -->
<!-- {!! $questions->render() !!} -->

<ul class="pagination">
@for ($i = 1; $i <= $reqPagination; $i++)
    <li class=<?php echo ( $i == $active ) ? 'active' : ''; ?>>
        <a href="?page={{$i}}">{{ $i }}</a>
    </li>
@endfor
</ul>