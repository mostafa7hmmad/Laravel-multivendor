
@include('Dashboard.links')



<div class="container  py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Clients table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-secondary text-xxs font-weight-bolder">Username</th>
                      <th class="text-uppercase text-dark text-secondary text-xxs font-weight-bolder ps-2">E-mail</th>
                      <th class="text-center text-dark text-uppercase text-secondary text-xxs font-weight-bolder "></th>
                      <th class="text-center text-dark text-uppercase text-secondary text-xxs font-weight-bolder ">phone</th>
                      <th class="text-center text-dark text-uppercase text-secondary text-xxs font-weight-bolder ">password</th>
                      <th class="text-secondary d-flex justify-content-end">
                 <a href="{{ route('Dasboard-customer-us') }}"><button class="btn btn-info btn-sm me-2 ">Back</button></a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @foreach ($customers as $c )


                      <td>

                          <div class="d-flex flex-column justify-content-center ms-2">
                            <h6 class="mb-0 text-sm text-dark">{{ $c->username }}</h6>

                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-dark">{{ $c->email }}</p>


                      </td>
                      <td class="align-middle text-center ">

                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold text-dark">{{ $c->phone }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold text-dark">{{ $c->password }}</span>
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








