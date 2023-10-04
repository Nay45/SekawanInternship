<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekawan Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway&display=swap');

    body {
        background: #f9f9f9;
        font-family: "Raleway", sans-serif;
        color: #151515;
    }
    
    label {
        color: black;
        font-weight: 600;
        font-size: 0.85em;
    }
    
    input:focus {
        outline: none;
    }
    
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    
    .form {
        display: flex;
        width: auto;
        background: #fff;
        margin: 15px;
        padding: 25px;
        border-radius: 25px;
        box-shadow: 0px 10px 25px 5px #0000000f;
    }
    
    .sign-in-section {
        padding: 30px;
    }
    
    .sign-in-section h1 {
        text-align: center;
        font-weight: 700;
        position: relative;
    }
    
    .sign-in-section h1:after {
        position: absolute;
        content: "";
        height: 5px;
        bottom: -15px;
        margin: 0 auto;
        left: 0;
        right: 0;
        width: 40px;
    }
    
    .form-field {
        display: block;
        width: 300px;
        margin: 10px auto;
    }
    
    .form-field label {
        display: block;
        margin-bottom: 10px;
    }
    
    .form-field input[type="email"], input[type="password"] {
        width: -webkit-fill-available;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #e8e8e8;
    }
    
    .form-field input::placeholder {
        color: #e8e8e8;
    }
    
    .form-field input:focus {
        border: 1px solid #AE00FF;
    }
    
    .btn {
        padding: 15px;
        font-size: 1em;
        width: 100%;
        border-radius: 25px;
        border: none;
        margin: 20px 0px;
    }
    
    .btn-signin {
        cursor: pointer;
        background: #7F00FF;
        background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);
        background: linear-gradient(to right, #E100FF, #7F00FF);
        box-shadow: 0px 5px 15px 5px #840fe440;
        color: #fff;
    }
</style>
<body>
    <div class="container">
        <div class="form">
            <div class="sign-in-section">
                <h1>Log in</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@gmail.com">
                    </div>
                    <div class="form-field">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*********">
                    </div>
                    <div class="form-field">
                        <input type="submit" class="btn btn-signin" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>