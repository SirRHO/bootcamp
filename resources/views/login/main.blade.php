<head>
    <style>
    .login-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Menggunakan tinggi layar penuh untuk sentralisasi vertikal */
        margin: 0;
    }

    .form-big {
        position: relative;
        z-index: 1;
        background: url('{{ asset('assets/img/tamu.jpg')}}') no-repeat center;
        background-size: cover;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        color: white;
        width: 50%;
    }

    .form-small {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 60px auto 100px; /* Atur margin untuk mengatur jarak dengan form besar */
        padding: 30px; /* Ukuran padding lebih kecil dibandingkan form besar */
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        color: black;
    }

    .form-small input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;

    }

    .form-small button {
        font-family: "Roboto", sans-serif;
        font-weight: bold;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;

        border: 2px solid transparent;
        margin-top: 20px;
    }

    .form-small button:hover,
    .form-small button:active,
    .form-small button:focus {
        background: #EF8B33;
    }

    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }

    .container:before,
    .container:after {
        content: "";
        display: block;
        clear: both;
    }

    body {
        background: #333333; /* Warna gelap sebagai fallback */
        background: rgb(51, 51, 51); /* Warna gelap menggunakan nilai RGB */
        background: linear-gradient(90deg, rgba(51, 51, 51, 1) 0%, rgba(211, 211, 211, 1) 100%);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    html, body {
        height: 100%;
        margin: 0;
        overflow: hidden; /* Menyembunyikan scrollbar */
    }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="form-big">
            @yield('content')
        </div>
    </div>
</body>
