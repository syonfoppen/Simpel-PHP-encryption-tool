<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Project Uknown</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">PHP Encryption tool</a>

      </div>
    </nav>
      <div class="container main-page">
        <div class="card" style="padding: 20px">
          <div class="card-body">
            <h1>The tool</h1>
            <p>This is a tool that lets you encrypt and decrypt text using the openssl_encrypt function of php.</p>
            <div class="btn-group btn-group-lg" style="margin: auto">
              <a href="#Encrypt" class="btn btn-secondary">Encrypt</a>
              <a href="#Decrypt" class="btn btn-secondary">Decrypt</a>
            </div>
          </div>
        </div>
        <a name="Encrypt"></a>
        <div style="padding-top:50px">
          <div class="card" style="padding: 20px">
            <div class="card-body">
              <h1>Encrypt</h1>
              <form class="" action="index.php#Encrypt" method="post">
                <p>select a cipher method</p>
                <select class="form-control" name="encrypt_cipher_method">
                  <?php
                    $methodes = openssl_get_cipher_methods();
                    foreach ( $methodes as $key => $value) {
                      echo "<option  name='encrypt_cipher_method' value='$value'>$value</option>";
                    }
                   ?>
                </select>
                <br>
                <p>Put in the encyption key</p>
                <input type="text" name="encrypt_key" class="form-control" value="">
                <br>
                <p>Put in the text that you want to encrypt</p>
                <textarea style="height: 200px" class="form-control" name="encrypt_text" rows="8" cols="80"></textarea>
                <br>
                <input type="submit" name="encrypt" class="btn btn-success" value="Encrypt">
              </form>
              <br>
              <?php
                include 'functions.php';
                if(isset($_POST['encrypt'])) {
                  if (empty($_POST["encrypt_cipher_method"])) {
                    $encrypt_error .= " No cipher mothod given!";
                  }
                  else {
                    $cipher = $_POST["encrypt_cipher_method"];
                  }

                  if (empty($_POST["encrypt_key"])) {
                    $encrypt_error .= " No key given!";
                  }
                  else {
                    $encrypt_key = $_POST["encrypt_key"];
                  }

                  if (empty($_POST["encrypt_text"])) {
                    $encrypt_error .= " No Text given!";
                  }
                  else {
                    $encrypt_text = $_POST["encrypt_text"];
                  }

                  if (empty($encrypt_error)) {
                    echo "<h4>Result: <h4>";
                    echo "<textarea style='height: 200px' disabled='disabled' class='form-control' name='encrypt_text'>" . encrypt($encrypt_text,$encrypt_key,$cipher) . "</textarea>";
                  }
                  else {
                    echo "<h2>Error</h2>";
                    echo $encrypt_error;
                  }
                }
               ?>
            </div>
          </div>
        </div>
        <a name="Decrypt"></a>
        <div style="padding-top:50px">
          <div class="card" style="padding: 20px">
            <div class="card-body">
              <h1>Decrypt</h1>
              <form class="" action="index.php#Decrypt" method="post">
                <p>select a cipher method</p>
                <select class="form-control" name="Decrypt_cipher_method">
                  <?php
                    $methodes = openssl_get_cipher_methods();
                    foreach ( $methodes as $key => $value) {
                      echo "<option  name='Decrypt_cipher_method' value='$value'>$value</option>";
                    }
                   ?>
                </select>
                <br>
                <p>Put in the decryption key</p>
                <input type="text" name="Decrypt_key" class="form-control" value="">
                <br>
                <p>Put in the text that you want to decrypt</p>
                <textarea style="height: 200px" class="form-control" name="Decrypt_text" rows="8" cols="80"></textarea>
                <br>
                <input type="submit" name="Decrypt" class="btn btn-success" value="Decrypt">
              </form>
              <br>
              <?php

                if(isset($_POST['Decrypt'])) {

                  if (empty($_POST["Decrypt_cipher_method"])) {
                    $Decrypt_error .= " No cipher mothod given!";
                  }
                  else {
                    $Decrypt_cipher = $_POST["Decrypt_cipher_method"];
                  }

                  if (empty($_POST["Decrypt_key"])) {
                    $Decrypt_error .= " No key given!";
                  }
                  else {
                    $Decrypt_key = $_POST["Decrypt_key"];
                  }

                  if (empty($_POST["Decrypt_text"])) {
                    $Decrypt_error .= " No Text given!";
                  }
                  else {
                    $Decrypt_text = $_POST["Decrypt_text"];
                  }

                  if (empty($Decrypt_error)) {
                    echo "<h4>Result: <h4>";
                    echo "<textarea style='height: 200px' disabled='disabled' class='form-control' name='encrypt_text'>" . decrypt($Decrypt_text,$Decrypt_key,$Decrypt_cipher) . "</textarea>";
                  }
                  else {
                    echo "<h2>Error</h2>";
                    echo $Decrypt_error;
                  }
                }
               ?>
            </div>
          </div>
        </div>
      <div style="padding-top:50px"> </div>
      </div>
    </div>

</body>

</html>
