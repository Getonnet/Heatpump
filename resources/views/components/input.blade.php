<div class="form-group">
    @php
        $uid = uniqid();
    @endphp
    <label for="x{{$uid}}">{{$title ?? 'Text'}}</label>
    <input type="{{$type ?? 'text'}}" name="{{$name ?? 'name'}}" class="form-control" id="x{{$uid}}" placeholder="{{$title ?? 'Text'}}">
</div>
