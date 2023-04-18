<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YaPresindo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;600;900&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <style>
        html,
        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-robot {
            font-family: 'Roboto', sans-serif;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .box-w {
            display: flex;
            justify-content: center;
            align-content: center;
            margin-top: 3rem;
        }

        .box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            max-width: 600px;
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15), 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        h1.title {
            font-size: 24px;
        }

        span.name,
        span.email {
            color: #e77070;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="x-yapresindo-fbapp">
    <div class="container">
        <div class="box-w">
            <div class="box">
                <div class="m-5">
                    <h1 class="title">Facebook Data Deletion</h1>
                    <p class="font-roboto">Berikut ini adalah status penghapusan data facebook anda pada website
                        YaPresindo.</p>
                    <hr>

                    @if ($found)
                        <div class="alert alert-success font-roboto">
                            Halo <span class="name">{{ $name }}</span>, penghapusan data facebook kamu untuk
                            email <span class="email">{{ $email }}</span>
                            saat ini telah berhasil.
                        </div>
                    @else
                        <div class="alert alert-danger font-roboto">
                            Mohon maaf, sepertinya ada kesalahan pada url yang anda kunjungi. Kami tidak dapat memeriksa
                            status penghapusan data Facebook anda melalui url yang anda berikan.
                        </div>
                    @endif

                    <div class="text-center">
                        <span class="copyright">Copyright &copy; {{ date('Y') }} <a
                                href="{{ url('/home') }}">YaPresindo</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add("bg-primary");
        });
    </script>
</body>

</html>
