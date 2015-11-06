<!-- This rendering can also be use for pagination but its too simple -->
<!-- {!! $questions->render() !!} -->

<ul class="pagination">
@for ($i = 1; $i <= $reqPagination; $i++)
    <li class=<?php echo ( $i == $active ) ? 'active' : ''; ?>>
    	<a href="?page={{$i}}">{{ $i }}</a>
    </li>
@endfor
</ul>