<!DOCTYPE html>
<!-- Coding By Ali Aslan -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>javaScript Drag & DropFile Upload</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>

  <div class="drag-area" ondrop="upload_file(event)" ondragover="return false">
    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
    <header>Drag & Drop to Upload File</header>
    <span>OR</span>
    <button>Browse File</button>
    <input type="file" name="file" id="file" hidden>
  </div>

  <script src="script.js"></script>

</body>

</html>
