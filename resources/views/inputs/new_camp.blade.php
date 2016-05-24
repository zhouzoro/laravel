
<div id="new-campus">
  <form>{{ csrf_field() }}
    <input name="cover" type="text" value="{{$post->as}}" class="hidden"/>
    <div class="cover"><a class="edit-cover"><i class="fa fa-picture-o"></i><i class="fa fa-plus-circle"></i></a></div>
    <div class="basic-info">
      <div class="ui input">
        <input name="title" type="text"/>
      </div>
      <div class="ui input">
        <input name="startDate" type="date"/>
      </div>
      <div class="ui input">
        <input name="endDate" type="date"/>
      </div>
    </div>
  </form>
</div>