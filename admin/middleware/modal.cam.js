
  document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureButton = document.getElementById('capture');
    const constraints = {
      video: true
    };

    // Abrir la cámara y mostrar la vista previa en el video
    function openCamera() {
      navigator.mediaDevices.getUserMedia(constraints)
        .then((stream) => {
          video.srcObject = stream;
        })
        .catch((err) => {
          console.error('Error accessing the camera: ', err);
        });
    }

    // Capturar la foto y mostrarla en el canvas
    function capturePhoto() {
      const context = canvas.getContext('2d');
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      context.drawImage(video, 0, 0, canvas.width, canvas.height);
      const dataURL = canvas.toDataURL('image/png');
      console.log('Captured photo: ', dataURL); // Puedes usar esta URL para subir la imagen al servidor
    }

    // Abrir la cámara cuando se abre el modal
    $('#cameraModal').on('shown.bs.modal', function() {
      openCamera();
    });

    // Detener la cámara cuando se cierra el modal
    $('#cameraModal').on('hidden.bs.modal', function() {
      const stream = video.srcObject;
      const tracks = stream.getTracks();

      tracks.forEach(function(track) {
        track.stop();
      });

      video.srcObject = null;
    });

    // Capturar la foto cuando se hace clic en el botón
    captureButton.addEventListener('click', capturePhoto);
  });
