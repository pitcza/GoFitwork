
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> GoFitwork </title>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">

        <!-- POPPINS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <main> 
            <div class="content"> 
                <div class="container"> 
                    <div class="forms">
                        <h1> LOGIN </h1>
                        <h2> Welcome to GoFitwork! </h2>
                        <div class="form-content">
                            <form action="{{ route('admin.authenticate')}}" method="POST">
                                @csrf
                                <div class="email">
                                    <input type="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" id="username"> 
                                    <label for="username" class="labelline">Username</label>
                                    @error('username')
                                                    <p class="invalid-feedback"> {{ $message }} </p>
                                                @enderror
                                </div>
                                <div class="password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value=""> 
                                    <label for="password" class="labelline_1">Password</label>
                                                @error('password')
                                                    <p class="invalid-feedback"> {{ $message }} </p>
                                                @enderror
                                </div>
        
                                <div class="login-btn">
                                    {{-- <a routerLink="/main" class="main">
                                        <h2> Login </h2>
                                    </a> --}}
                                    <button class="main" type="submit"> Login </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
                <div class="logo"> 
                    <img src="{{asset('assets/vector.png')}}"> 
                </div>
        </main>
    </body>
</html>