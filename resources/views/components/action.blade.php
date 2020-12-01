
<td class="text-right">
    <div class="dropdown">
        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            {{$slot}}
        </div>
    </div>
    @if(isset($del))
        <form id="delFormID{{$del}}"  action="#" method="POST" style="display: none;">
            @csrf
            @method('Delete')
        </form>
    @endif
</td>