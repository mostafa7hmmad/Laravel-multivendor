{{--  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
<link rel="stylesheet" href="{{ asset('style_data/demo.css') }}">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css')}}" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


</head>
<body class="body">


<div class="container mb-5 mt-5">


<div class="row">
<div class="container">
    <div class="row justify-content-end">
           <p class="text-end"><a href="{{ route('dashboard-us') }}"><button class="btn btn-danger btn-sm p-2">Back</button></a></p>

    </div>
</div>
    <table>

<thead>
          <tr>
            <th scope="col">number</th>

            <th scope="col">name</th>
            <th scope="col">Catname</th>
            <th scope="col">price</th>
            <th scope="col">img</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
<tbody>


@foreach ($subcat as $c)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$c->name}}</td>
<td>{{$c->price}}</td>

            <td><img class="w-25" src="{{ asset('uploades/subcat/'.$c->img) }}" alt=""></td>
            <td>
<p class="text-end"><a href="{{ route('subcat-creat-us') }}"><button class="btn btn-danger btn-sm ">AddNew</button></a></p>
                <p><a href="{{ route('subcat.edit-us',$c->id) }}"><button class="btn btn-info btn-sm">Edit</button></a></p>
                <a href="{{ route('sub-delete-us',$c->id) }}"><button class="btn btn-danger btn-sm ">Delete</button></a>
            </td>

          </tr>
          @endforeach

</tbody>
</table>
</div>
</div>


</body>
</html>
  --}}

@include('Dashboard.links')



<div class="container  py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">SubCat table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-secondary text-xxs font-weight-bolder">SubCat name</th>
                      <th class="text-uppercase text-dark text-secondary text-xxs font-weight-bolder ps-2">Price</th>
                      <th class="text-center text-dark text-uppercase text-secondary text-xxs font-weight-bolder ">img</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder "></th>
                      <th class="text-secondary d-flex justify-content-end">
                 <a href="{{ route('dashboard-us') }}"><button class="btn btn-info btn-sm me-2 ">Back</button></a>
                <a href="{{ route('subcat-creat-us') }}"><button class="btn btn-danger btn-sm ">AddNew </button></a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @foreach ($subcat as $c )


                      <td>

                          <div class="d-flex flex-column justify-content-center ms-2">
                            <h6 class="mb-0 text-sm text-dark">{{ $c->name }}</h6>

                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-dark">{{ $c->price }}</p>

                      </td>
                      <td class="align-middle text-center ">
                       <img class="w-20" src="{{ asset('uploades/subcat/'.$c->img) }}" alt="">
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                      <td class="align-middle  d-flex justify-content-end me-3">
                        <a href="{{ route('subcat.edit-us',$c->id) }}"><button class="btn btn-info btn-sm me-2">Edit</button></a>
                <a href="{{ route('sub-delete-us',$c->id) }}"><button class="btn btn-danger btn-sm ">Delete</button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>








