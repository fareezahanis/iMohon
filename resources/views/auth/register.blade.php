<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar - iMohon</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffffff;
        }

        .signup-page {
            min-height: 100vh;
            display: flex;
        }

        .signup-left {
            width: 42%;
            min-height: 100vh;
            background:#29158f;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            padding : 40px;
        }

        .rtm-logo{
            width: 150px;
            max-width: 100%;
        }

        .system-name{
            font-size: 32px;
            font-weight: bold;
        }

        .equipment-image{
            width:380px;
            max-width:100%;
        }




        .signup-right{
            width: 58%;
            min-height: 100vh;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }


        .signup-card{
            width:100%;
            max-width: 650px;
            min-height: 480px;
            background: #f8f8ff;
            border: 2px solid #29158f;
            border-radius: 18px;
            padding: 50px 30px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }

        .signup-title{
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
            color: #111111;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 15px;
        }


        .input-group{
            margin-bottom: 15px;
        }

        .full-width {
            grid-column: span 1; 
        }

        .signup-input{
            width: 100%;
            height: 55px;

            padding: 0 25px;

            border: none;
            border-radius:16px;
            background: white;

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.18);
            font-size: 14px;
            outline: none;
        }

        .signup-textarea {
            width: 100%;
            height: 120px;
            padding: 15px 20px;
            border: none;
            border-radius: 16px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.12);
            font-size: 13px;
            outline: none;
            resize: none;
            font-family: Arial, sans-serif;
        }

        .signup-input:focus, .signup-textarea:focus{
            box-shadow:
                0 0 0 2px #29158f,
                0 4px 8px rgba(249, 244, 244, 0.18);
        }

        .signup-input::placeholder, .signup-textarea::placeholder{
            color: #b8b8b8;
        }



        .signup-button{
           display: block;
            width: 150px;
            height: 42px;
            margin: 20px auto 15px;
            border: none;
            border-radius: 25px;
            background: #29158f;
            color: white;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }
         
        .signup-button:hover{
            background: #211174;
        }

        .login-text{
            text-align: center;
            font-size: 12px;
            color: #999999;
        }

        .login-link{
            color: #333333;
            font-weight: bold;
            text-decoration: none;
            margin-left: 5px;
        }

        .login-link:hover{
            color: #29158f;
        }

        .error-message{
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }


        @media (max-width: 900px){
            .signup-page {
                flex-direction: column;
            }

            .signup-left,
            .signup-right{
                width: 100%;
                min-height: auto;
            }

            .signup-left{
                padding: 50px 20px;
            }
            .signup-right{
                padding: 30px 30px;
            }
            .signup-card{
                min-height: auto;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>


    <body>

    <div class="signup-page">


        <div class="signup-left">

        <img
            src="{{ asset('images/rtmlogo.png') }}"
            alt="RTM Logo"
            class=rtm-logo
        >

        <div class="system-name">
            iMohon
        </div>

        <img 
            src="{{ asset('images/logo.png') }}"
            alt="ICT Equipment"
            class=equipment-image
        >

</div>

    <div class="signup-right">
        <div class="signup-card">

        <h1 class="signup-title">
            Daftar
        </h1>

        <form method="POST" action="{{ route('register') }}">

                @csrf
        
        <div class="form-grid">


        <div class="column-left">
            <!-- NO. KAD PENGENALAN -->
            <div class="input-group">
                <input 
                id="ic" 
                type="text" 
                name="ic" 
                class="signup-input" 
                placeholder="No. kad pengenalan" 
                value="{{ old('ic') }}" 
                required 
                autofocus 
                autocomplete="username">
                @if ($errors->get('ic'))
                    <div class="error-message">{{ $errors->first('ic') }}</div>
                @endif
            </div>

            <!-- KATA LALUAN -->
            <div class="input-group">
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    class="signup-input" 
                    placeholder="Kata laluan" 
                    required 
                    autocomplete="new-password">
                @if ($errors->get('password'))
                    <div class="error-message">
                    {{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- SAH KATA LALUAN -->
            <div class="input-group">
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="signup-input" 
                    placeholder="Sah kata laluan" 
                    required autocomplete="new-password">
            </div>
        </div>

        
        <div class="column-right">
            <!-- NAMA -->
            <div class="input-group">
                <input 
                    type="text" 
                    name="name" 
                    class="signup-input" 
                    placeholder="Nama" 
                    value="{{ old('name') }}" 
                    required>
                @if ($errors->get('name'))
                    <div class="error-message">
                        {{ $errors->first('name') }}</div>
                @endif
            </div>

            <!-- EMEL -->
            <div class="input-group">
                <input 
                    type="email" 
                    name="email" 
                    class="signup-input" 
                    placeholder="Emel" 
                    value="{{ old('email') }}" 
                    required>
                @if ($errors->get('email'))
                    <div class="error-message">
                        {{ $errors->first('email') }}</div>
                @endif
            </div>

        

            <!-- NO. TEL -->
            <div class="input-group">
                <input 
                type="text" 
                name="phone" 
                class="signup-input" 
                placeholder="No. Tel" 
                value="{{ old('phone') }}" 
                required>
                @if ($errors->get('phone'))
                    <div class="error-message">
                        {{ $errors->first('phone') }}</div>
                @endif
            </div>
             <!-- JAWATAN -->
            <div class="input-group">
                <input 
                    type="jawatan" 
                    name="jawatan" 
                    class="signup-input" 
                    placeholder="Jawatan" 
                    value="{{ old('jawatan') }}" 
                    required>
                @if ($errors->get('jawatan'))
                    <div class="error-message">
                        {{ $errors->first('jawatan') }}</div>
                @endif
            </div>
             <!-- BAHAGIAN -->
            <div class="input-group">
                <input 
                    type="text" 
                    name="bahagian" 
                    class="signup-input" 
                    placeholder="Bahagian" 
                    value="{{ old('bahagian') }}" 
                    required>
                @if ($errors->get('bahagian'))
                    <div class="error-message">
                        {{ $errors->first('bahagian') }}</div>
                @endif
            </div>

            <!-- unit -->
            <div class="input-group">
                <input 
                type="text" 
                name="unit" 
                class="signup-input" 
                placeholder="Unit" 
                value="{{ old('unit') }}" 
                required>
                @if ($errors->get('unit'))
                    <div class="error-message">
                        {{ $errors->first('unit') }}</div>
                @endif
            </div>

            <!-- ALAMAT PEJABAT -->
            <div class="input-group" style="margin-bottom: 0;">
                <textarea name="address" 
                class="signup-textarea" 
                placeholder="Alamat pejabat" required>{{ old('address') }}</textarea>
                @if ($errors->get('address'))
                    <div class="error-message">{{ $errors->first('address') }}</div>
                @endif
            </div>
        </div>

    </div>

                <!-- SUBMIT BUTTON -->
                <button type="submit" class="signup-button">
                    
                    Daftar
                </button>

                <!-- FOOTER LINK TO LOGIN -->
                <div class="login-text">
                    Sudah ada akaun?
                    <a href="{{ route('login') }}" class="login-link">
                        Log Masuk
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
</body>
</html>








            







        