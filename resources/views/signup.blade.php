<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Sign-Up | Ludiflex</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: #ececec;
        }
        .box-area {
            width: 930px;
        }
        .rounded-4 {
            border-radius: 20px;
        }
        .rounded-5 {
            border-radius: 30px;
        }
        .left-box {
            background: #28a745;
            padding: 40px 30px;
        }
        .right-box {
            padding: 40px 30px 40px 40px;
        }
        @media only screen and (max-width: 768px) {
            .box-area {
                margin: 0 10px;
            }
            .left-box {
                height: 100px;
                overflow: hidden;
            }
            .right-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="{{asset('images/inscription.png')}}" class="img-fluid" style="width: 600px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Join Us!</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Be part of our amazing community by creating your account now.</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Create Your Account</h2>
                        <p>Fill out the form below to sign up.</p>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Username" required>
                            @error('username')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="first_name" class="form-control form-control-lg bg-light fs-6" placeholder="First Name" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="last_name" class="form-control form-control-lg bg-light fs-6" placeholder="Last Name" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address" required>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password" required>
                            @error('password_confirmation')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        {{-- <div class="input-group mb-3">
                            <select name="sexe" class="form-select form-select-lg bg-light fs-6" required>
                                <option value="" disabled selected>Select Sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('sex')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="address" class="form-control form-control-lg bg-light fs-6" placeholder="Address" required>
                            @error('address')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="tel" name="phone_number" class="form-control form-control-lg bg-light fs-6" placeholder="Phone Number" required>
                            @error('phone_number')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" name="age" class="form-control form-control-lg bg-light fs-6" placeholder="Age" min="0" required>
                            @error('age')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <textarea name="bio" class="form-control form-control-lg bg-light fs-6" rows="3" placeholder="Short Bio" required></textarea>
                            @error('bio')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="school" class="form-control form-control-lg bg-light fs-6" placeholder="school" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="sector" class="form-control form-control-lg bg-light fs-6" placeholder="sector" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="profile_picture" class="form-control form-control-lg bg-light fs-6" accept="image/*">
                        </div> --}}
                        @if(session('error'))
                            <p class="text-danger"> {{ session('error') }}</p>
                        @endif
                        <div class="input-group mb-3 " style="padding-left:80%;margin-bottom : 0px;">
                            <button class="btn btn-lg btn-success w-100 fs-6">Sign Up</button>
                        </div>
                    </form>
                    
                    <div class="row">
                        <small>Already have an account?<a href="{{ route('login') }}">Login</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
