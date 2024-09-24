<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vista previa del producto</title>
  <link rel="stylesheet" href="../backend/views/animation/productoPhoneView.css">
</head>
<body>
  <header>
    <img src="../../media/pages/sensi.png" alt="">
    <p>Sensi Home</p>
  </header>

  <h1 class="title-shop">Vista previa</h1>
  <main class="main bd-grid">
    <article class="card">
      <div class="card__img">
        <img id="imgPreview_phone" src="../../media/pages/productDefault.png" alt="">
      </div>
      <div class="card__precis">
        <a href="" class="card__iconHearth"><ion-icon name="heart-outline"></ion-icon></a>
        <div>
          <span id="name_preview" class="card__preci card__preci--before">Nombre</span>
          <span id="cost_preview" class="card__preci card__preci--now">$0,000</span>
        </div>
        
      </div>
    </article>
  </main>

  <footer>
    
  </footer>

  <!-- ICONS -->
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script>
    window.addEventListener('message', function(event) {
      if (event.data.type === 'updatePreview') {
        const { name, price, imageSrc } = event.data;
        document.getElementById('name_preview').textContent = name;
        document.getElementById('cost_preview').textContent = price;
        document.getElementById('imgPreview_phone').src = imageSrc;
      }
    });
  </script>
</body>
</html>