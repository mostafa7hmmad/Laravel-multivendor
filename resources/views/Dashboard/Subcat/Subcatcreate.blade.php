

<link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css')}}" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<div class="container m-5 p-5">

    <div class="d-flex justify-content-between mb-3">

        <a href="{{route('subcat-Dashboard-us')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    <form method="POST" action="{{ route('subcat-store-us') }}" enctype="multipart/form-data">
    @csrf
<lable>name</lable>
<input class="form-control" type="text" name="name" required>
<lable>price</lable>
<input class="form-control" type="text" name="price" required>
<lable>img</lable>
<input class="form-control" type="file" name="img" required>
<lable>Cats</lable>
<select name="cat_id" required class="form-control">
        @foreach ($cat as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
</select>


<button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>


