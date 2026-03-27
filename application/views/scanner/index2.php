<html>

<head>
    <title>Html-Qrcode Demo</title>
    <style>
        #reader {
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }
    </style>

    <body>
        <div id="reader"></div>
        <div id="qr-reader-results"></div>
    </body>
    <script src="assets/js/qr/html5-qrcode.min.js"></script>
    <script>

        const html5QrCode = new Html5Qrcode("reader");
        const qrCodeSuccessCallback = message => { /* handle success */ }
        const config = {
            fps: 10,
            qrbox: 250
        };

        // If you want to prefer front camera
        html5QrCode.start({
            facingMode: "environment"
        }, config, onScanSuccess);

        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(qrCodeMessage) {
            if (qrCodeMessage !== lastResult) {
                ++countResults;
                lastResult = qrCodeMessage;
                resultContainer.innerHTML += `<div>[${countResults}] - ${qrCodeMessage}</div>`;
            }
        }
    </script>
</head>

</html>