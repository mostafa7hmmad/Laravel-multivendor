
@include('Dashboard.links')



<div class="container   py-4">

      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Cat table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-secondary text-xxs font-weight-bolder">Cat name</th>
                      <th class="text-uppercase text-dark text-secondary text-xxs font-weight-bolder ps-2"></th>
                      <th class="text-center text-dark text-uppercase text-secondary text-xxs font-weight-bolder "></th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">img</th>
                      <th class="text-secondary d-flex justify-content-end">
                 <a href="{{ route('Dasboard-customer-us') }}"><button class="btn btn-info btn-sm me-2 ">Back</button></a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @foreach ($cats as $c )


                      <td>

                          <div class="d-flex flex-column justify-content-center ms-2">
                            <h6 class="mb-0 text-sm text-dark">{{ $c->name }}</h6>

                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-dark"></p>

                      </td>
                      <td class="align-middle text-center ">
                      <span class="text-secondary text-xs font-weight-bold"></span>

                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><img class="w-20" src="{{ asset('uploades/cat/'.$c->img) }}" alt=""></span>
                      </td>
                      <td class="align-middle  d-flex justify-content-end me-3">
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








