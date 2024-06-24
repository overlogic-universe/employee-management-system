<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic</title>
    <link href="/features/employee/styles/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../../assets/logog.png" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background: #0F1322;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }

        .card-body {
            padding: 20px;
        }

        .scan-logo {
            text-align: center;
            padding: 15px;
        }

        .logo {
            max-width: 200px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>

    <div class="card" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-header" data-aos="fade-down" data-aos-delay="200">
            Scan QR Code
        </div>
        <div class="card-body" data-aos="zoom-in" data-aos-delay="400">
            <div id="reader"></div>
        </div>
        <div class="scan-logo" data-aos="fade-up" data-aos-delay="600">
            <a href="https://www.instagram.com/overlogic.id"> <img src="../../../assets/logo.png" alt="Logo" class="logo"></a>
        </div>
    </div>
    <script>
        AOS.init();

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
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/scan-process');
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.valid) {
                        showAlert('Success', 'Successfully scan QR Code', 'success');
                    } else {
                        showAlert('Error', 'Invalid QR Code format!', 'error');
                    }
                } else {
                    console.error('Failed to validate QR Code');
                    showAlert('Error', 'Failed to validate QR Code', 'error');
                }
            };

            xhr.send(JSON.stringify({
                qrCode: qrCodeResult
            }));
        }

        function showAlert(title, message, type) {
            const alertEl = document.createElement('div');
            alertEl.className = `alert alert-${type}`;
            alertEl.setAttribute('data-aos', 'fade-down');
            alertEl.setAttribute('data-aos-duration', '500');
            alertEl.innerHTML = `
                <h4>${title}</h4>
                <p>${message}</p>
            `;
            document.body.appendChild(alertEl);

            setTimeout(() => {
                alertEl.remove();
            }, 3000);
        }
    </script>
</body>

</html>
