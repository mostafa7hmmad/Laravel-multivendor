

<link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css')}}" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<div class="container m-5 p-5">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="">Category/{{$cat->name}}</h4>
        <a href="{{route('cat-us')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
<form method="POST" action="{{ route('cat-update',$cat->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$cat->id}}">
    <div class="mb-3">
        <label>name</label>
        <input type="name" name="name"  class="form-control" value="{{$cat->name}}">
        <label>img</label>
        <input type="file" name="img"  class="form-control-file" value="{{$cat->img}}" class="my-5">

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


