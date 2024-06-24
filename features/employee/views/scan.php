<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic</title>
    <link href="/features/employee/styles/style.css" rel="stylesheet" />
    <style>
        *,
        body,
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="card">
        <div class="card-header">
            Scan QR Code
        </div>
        <div class="card-body">
            <div id="reader"></div>
        </div>
        <div class="scan-logo">
            <a href="https://www.instagram.com/overlogic.id"> <img src="../../../assets/logo.png" alt="Logo" class="logo"></a>
        </div>
    </div>
    <script>
        const scanner = new Html5QrcodeScanner('reader', {
            qrbox: {
                width: 250,
                height: 250,
            },
            fps: 20,
        });


        scanner.render(success, error);

        function success(result) {
            updateEmployeeActivity(result);
        }

        function error(err) {
            console.error(err);
        }

        function updateEmployeeActivity(qrCodeResult) {
            // Membuat objek XMLHttpRequest untuk membuat permintaan HTTP ke server tanpa memuat ulang halaman.
            const xhr = new XMLHttpRequest();

            // Mengatur permintaan HTTP POST ke URL endpoint /scan-process di server.
            xhr.open('POST', '/scan-process');

            // Mengatur header Content-Type untuk permintaan JSON
            xhr.setRequestHeader('Content-Type', 'application/json');

            // Menangani respon dari permintaan
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    // Memeriksa apakah QR Code valid berdasarkan respons dari server
                    if (response.valid) {
                        alert(`Successfully scan QR Code`);
                    } else {
                        alert('Invalid QR Code format!');
                    }
                } else {
                    console.error('Failed to validate QR Code');
                }
            };

            // Mengirim data JSON ke server dengan menggunakan nilai qrCodeResult sebagai payload
            xhr.send(JSON.stringify({
                qrCode: qrCodeResult
            }));
        }
    </script>
</body>

</html>