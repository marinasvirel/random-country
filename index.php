<?php
require_once "countries.php";

function select($post, $option)
{
  if (!empty($_POST[$post]) and $_POST[$post] === $option) {
    echo 'selected';
  }
}

function filter($countries)
{
  $arr = $countries;
  foreach ($arr as $key => $value) {
    if (isset($_POST['continent'])) {
      if ($value['continent'] !== $_POST['continent']) {
        unset($arr[$key]);
      }
    }
    if (isset($_POST['language'])) {
      if ($value['language'] !== $_POST['language']) {
        unset($arr[$key]);
      }
    }
    if (isset($_POST['min'])) {
      if ($value['population'] < $_POST['min']) {
        unset($arr[$key]);
      }
    }
    if (isset($_POST['max'])) {
      if ($value['population'] > $_POST['max']) {
        unset($arr[$key]);
      }
    }
  }
  return $arr;
}

$link = "";
if ($_POST) {
  $arr = filter($countries);
  $link = "<div class='link'>нет такой страны</div>";
  if (!empty($arr)) {
    $href = $arr[array_rand($arr)]['map'];
    $link = "<iframe src='$href' style='border:0;'></iframe>";
  }
}

echo "<pre>";
var_dump($arr);

?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Случайная страна</title>
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header class="edge">
    <div class="container">
      <img src="img/logo.png" alt="logo">
    </div>
  </header>
  <main>
    <div class="container">
      <div class="form">
        <h1>Случайная страна</h1>
        <form action="" method="post">
          <div class="select-wrapper">
            <p class="label">Континент</p>
            <select name="continent" id="continent">
              <option selected disabled hidden></option>
              <option value="Евразия" <?php select("continent", "Евразия"); ?>>
                Евразия
              </option>
              <option value="Африка" <?php select("continent", "Африка"); ?>>Африка</option>
              <option value="Южная Америка" <?php select("continent", "Южная Америка"); ?>>Южная Америка</option>
              <option value="Северная Америка" <?php select("continent", "Северная Америка"); ?>>Северная Америка</option>
            </select>
          </div>
          <div class="select-wrapper">
            <p class="label">Язык</p>
            <select name="language" id="">
              <option selected disabled hidden></option>
              <option value="Русский" <?php select("language", "Русский"); ?>>Русский</option>
              <option value="Английский" <?php select("language", "Английский"); ?>>Английский</option>
              <option value="Французский" <?php select("language", "Французский"); ?>>Французский</option>
              <option value="Испанский" <?php select("language", "Испанский"); ?>>Испанский</option>
              <option value="Китайский" <?php select("language", "Китайский"); ?>>Китайский</option>
              <option value="Японский" <?php select("language", "Японский"); ?>>Японский</option>
            </select>
          </div>
          <div class="select-wrapper">
            <p class="label">Минимальное&nbsp;население</p>
            <select name="min" id="">
              <option selected disabled hidden></option>
              <option value="1000" <?php select("min", "1000"); ?>>1000</option>
              <option value="10000" <?php select("min", "10000"); ?>>10000</option>
              <option value="100000" <?php select("min", "100000"); ?>>100000</option>
              <option value="1000000" <?php select("min", "1000000"); ?>>1000000</option>
              <option value="10000000" <?php select("min", "10000000"); ?>>10000000</option>
              <option value="100000000" <?php select("min", "100000000"); ?>>100000000</option>
            </select>
          </div>
          <div class="select-wrapper">
            <p class="label">Максимальное&nbsp;население</p>
            <select name="max" id="">
              <option selected disabled hidden></option>
              <option value="1000" <?php select("max", "1000"); ?>>1000</option>
              <option value="10000" <?php select("max", "10000"); ?>>10000</option>
              <option value="100000" <?php select("max", "100000"); ?>>100000</option>
              <option value="1000000" <?php select("max", "1000000"); ?>>1000000</option>
              <option value="10000000" <?php select("max", "10000000"); ?>>10000000</option>
              <option value="100000000" <?php select("max", "10000000"); ?>>100000000</option>
            </select>
          </div>
          <button type="submit" name="submit">Выдать случайную страну</button>
        </form>
      </div>
      <div class="map">
        <?php echo $link ?>
      </div>
    </div>
  </main>
  <footer class="edge">
    <div class="container">
      <div class="img">
        <img src="img/logo.png" alt="logo">
      </div>
      <p>© Зинченко Марина, 2025</p>
    </div>
  </footer>
</body>

</html>