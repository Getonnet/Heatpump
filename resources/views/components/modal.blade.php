
<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-{{$size ?? ''}}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">{{$title ?? 'Box Title'}}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{$action ?? '#'}}" method="post" ENCTYPE="multipart/form-data">
                @csrf
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn btn-primary  ml-auto">{{__('Save changes')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
