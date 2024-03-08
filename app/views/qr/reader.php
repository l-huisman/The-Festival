<!DOCTYPE html>
<html>

<head>
    <title>QR Reader</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav class="d-flex justify-content-center navbar navbar-expand-lg navbar-light bg-light">
            <!-- Main page -->
            <a class="navbar-brand mr-3" href="#">QR Reader</a>
            <button href="" class="btn btn-outline-info" id="toggleCamera">Camera</button>
            <!-- Todo: Go to the ticket that was scanned it should save it in memory so the user can switch between camera and the ticket. -->
            <a class="navbar-brand ml-3" href="#">Ticket</a>
        </nav>
    </header>
    <div class="container d-flex justify-content-center flex-column align-items-center">
        <p id="tooltip">To enable you camera press the button above.</p>
        <video id="qrScanner"></video>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        $(document).ready(function() {
            let scanner = new Instascan.Scanner({
                video: document.getElementById('qrScanner')
            });
            scanner.addListener('scan', function(content) {
                // Handle scanned QR code content here
                console.log(content);
            });
            let cameras;
            let currentCamera = 0;
            let isCameraOn = false;
            Instascan.Camera.getCameras().then(function(cams) {
                cameras = cams;
                if (cameras.length > 0 && isCameraOn == True) {
                    // Start the first camera
                    scanner.start(cameras[currentCamera]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });

            // Toggle camera on button click
            $('#toggleCamera').click(function() {
                if (isCameraOn) {
                    scanner.stop(cameras[currentCamera]);
                    $('#toggleCamera').removeClass('btn-info').addClass('btn-outline-info');
                    $('#tooltip').text('To enable you camera press the button above.');
                } else {
                    scanner.start(cameras[currentCamera]);
                    $('#toggleCamera').removeClass('btn-outline-info').addClass('btn-info');
                    $('#tooltip').text('');
                }
                isCameraOn = !isCameraOn;
            });
        });
    </script>
</body>

</html>