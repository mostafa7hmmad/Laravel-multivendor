

<div class="d-flex justify-content-center align-items-center mt-5 mb-5">
<link rel="stylesheet" href="{{ asset('style_data_css/admin.css') }}">

    <div class="container">
    <div class="text-center mb-5">
            <h2 class="h222">Add new Admin:</h2>

                </div>
      @if ($errors->any())
        <div class="alert alert-danger" style="display: flex;justify-content: center;margin-bottom: 16px;margin-top: 16px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="background:#880707f2; padding:10px;color:white; border-radius:2%; width:400px;margin-left:30px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



                <div class="div">
                    <form action="{{ route('admin-store-us') }}" method="post">
                    @csrf
                      <label for="fname">Name*</label>
                      <input type="text" name="username" placeholder="enter Your username.." required autocomplete="off">
                      <label for="lname">Email*</label>
                      <input type="email" id="email" name="email" placeholder="enter Your email.." required autocomplete="off">
                      <label for="lname">Password</label>
                      <input type="password" name="password" placeholder="enter Your password.." required autocomplete="new-password"></div>

                      </div>
<div class="text-center bb mt-3" style="display: flex;justify-content: center;"><button style=" cursor: pointer;" class="button button-contactForm btn_1 fw-bold">Submit</button></div>
                    </form>
                  </div>
    </div>

</div>
