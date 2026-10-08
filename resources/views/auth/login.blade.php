<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Log Masuk - iMohon</title>

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

        .login-page {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           LEFT SIDE
        ========================= */

        .login-left {
            width: 42%;
            min-height: 100vh;
            background: #29158f;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 40px;
        }

        .rtm-logo {
            width: 150px;
            margin-bottom: 20px;
        }

        .system-name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 50px;
        }

        .equipment-image {
            width: 380px;
            max-width: 100%;
        }


        /* =========================
           RIGHT SIDE
        ========================= */

        .login-right {
            width: 58%;
            min-height: 100vh;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-card {
            width: 100%;
            max-width: 500px;
            min-height: 520px;

            background: #f8f8ff;

            border: 2px solid #29158f;
            border-radius: 18px;

            padding: 70px 45px;

            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }

        .login-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
            color: #111111;
        }


        /* =========================
           INPUT
        ========================= */

        .input-group {
            margin-bottom: 25px;
        }

        .login-input {
            width: 100%;
            height: 55px;

            padding: 0 25px;

            border: none;
            border-radius: 16px;

            background: white;

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.18);

            font-size: 14px;

            outline: none;
        }

        .login-input:focus {
            box-shadow:
                0 0 0 2px #29158f,
                0 4px 8px rgba(0, 0, 0, 0.18);
        }

        .login-input::placeholder {
            color: #b8b8b8;
        }


        /* =========================
           BUTTON
        ========================= */

        .login-button {
            display: block;

            width: 150px;
            height: 45px;

            margin: 30px auto 15px;

            border: none;
            border-radius: 25px;

            background: #29158f;
            color: white;

            font-size: 13px;
            font-weight: bold;

            cursor: pointer;
        }

        .login-button:hover {
            background: #211174;
        }


        /* =========================
           REGISTER
        ========================= */

        .register-text {
            text-align: center;
            font-size: 12px;
            color: #999999;
        }

        .register-link {
            color: #333333;
            font-weight: bold;
            text-decoration: none;
            margin-left: 5px;
        }

        .register-link:hover {
            color: #29158f;
        }


        /* =========================
           ERROR
        ========================= */

        .error-message {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .login-page {
                flex-direction: column;
            }

            .login-left,
            .login-right {
                width: 100%;
                min-height: auto;
            }

            .login-left {
                padding: 50px 20px;
            }

            .login-right {
                padding: 30px 20px;
            }

            .login-card {
                min-height: auto;
            }
        }
    </style>
</head>


<body>

<div class="login-page">


    <!-- =====================================
         LEFT SIDE
    ====================================== -->

    <div class="login-left">

        <!-- RTM LOGO -->
        <img
            src="{{ asset('images/rtmlogo.png') }}"
            alt="RTM Logo"
            class="rtm-logo"
        >

        <!-- SYSTEM NAME -->
        <div class="system-name">
            iMohon
        </div>

        <!-- EQUIPMENT IMAGE -->
        <img
            src="{{ asset('images/logo.png') }}"
            alt="ICT Equipment"
            class="equipment-image"
        >

    </div>



    <!-- =====================================
         RIGHT SIDE
    ====================================== -->

    <div class="login-right">

        <div class="login-card">

            <!-- TITLE -->

            <h1 class="login-title">
                Log Masuk
            </h1>


            <!-- LOGIN FORM -->

            <form method="POST" action="{{ route('login') }}">

                @csrf


                <!-- NO. KAD PENGENALAN -->

                <div class="input-group">

                    <input
                        id="ic"
                        type="text"
                        name="ic"
                        class="login-input"
                        placeholder="No. Kad Pengenalan"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    @if ($errors->get('ic'))
                        <div class="error-message">
                            {{ $errors->first('ic') }}
                        </div>
                    @endif

                </div>


                <!-- PASSWORD -->

                <div class="input-group">

                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="login-input"
                        placeholder="Kata laluan"
                        required
                        autocomplete="current-password"
                    >

                    @if ($errors->get('password'))
                        <div class="error-message">
                            {{ $errors->first('password') }}
                        </div>
                    @endif

                </div>


                <!-- LOGIN BUTTON -->

                <button
                    type="submit"
                    class="login-button"
                >
                    Log Masuk
                </button>


                <!-- REGISTER -->

                <div class="register-text">

                    Tiada akaun?

                    @if (Route::has('register'))

                        <a
                            href="{{ route('register') }}"
                            class="register-link"
                        >
                            Daftar
                        </a>

                    @endif

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>