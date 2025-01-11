

<link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css')}}" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<div class="container m-5 p-5">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="">Category/{{$subcat->name}}</h4>
        <a href="{{route('subcat-Dashboard-us')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
<form method="POST" action="{{route('subcats.update-us',$subcat->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$subcat->id}}">
    <div class="mb-3">
        <label>name</label>
        <input type="name" name="name"  class="form-control" value="{{$subcat->name}}">
        <label>price</label>
        <input type="name" name="price"  class="form-control" value="{{$subcat->price}}">
        <label>img</label>
        <input type="file" name="img"  class="form-control-file" value="{{$subcat->img}}" class="my-5">
<lable>Cats</lable>
<select name="cat_id" required class="form-control">
        @foreach ($cat as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
</select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


