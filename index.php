<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./dist/output.css" rel="stylesheet" />
  <title>SMART POS LOGIN</title>
</head>

<?php
include 'connection.php';

$IDNumber = $pin = '';
$errors = array('IDNumber' => '', 'pin' => '');

function sanitizeInput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
  return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $IDNumber = sanitizeInput($_POST['IDNumber']);
  $pin = sanitizeInput($_POST['pin']);

  if (!preg_match('/^\d{6}$/', $IDNumber)) {
    $errors['IDNumber'] = 'ID Number must be exactly 6 digits';
  }

  if (!preg_match('/^\d{6}$/', $pin)) {
    $errors['pin'] = 'Pin must be exactly 6 digits';
  }

  if (empty($errors['IDNumber']) && empty($errors['pin'])) {
    $stmt = $conn->prepare("SELECT IDNumber, pin FROM staff WHERE IDNumber = ? AND pin = ?");
    $stmt->bind_param("ss", $IDNumber, $pin);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
      header('Location:./src/ChooseModule.html');
      exit();
    } else {
      $errors['IDNumber'] = 'Invalid ID Number or Pin';
    }
  }
}
?>

<body class="bg-black">
  <div class="flex items-center justify-center h-screen">
    <form action="index.php" method="POST" class="w-full max-w-sm bg-orange-500 border-4 border-black rounded-2xl hover:border-white transition-all p-8">
      <div class="flex flex-col items-center space-y-4 font-semibold text-gray-500">
        <img src="./src/assets/SVG/LOGO/WLOGO.svg" alt="BIG BREW LOGO" class="w-32 h-32" />
        <h1 class="text-white text-2xl">Sign in</h1>

        <input
          class="w-full p-2 bg-white rounded-md border border-gray-700 focus:border-blue-700 transition"
          placeholder="ID Number"
          name="IDNumber"
          maxlength="6"
          pattern="\d{6}"
          oninput="this.value = this.value.replace(/[^0-9]/g, '')"
          required
          value="<?= sanitizeInput($IDNumber) ?>" />
        <p class="text-red-600 text-sm"><?= $errors['IDNumber'] ?></p>

        <input
          class="w-full p-2 bg-white rounded-md border border-gray-700 focus:border-blue-700 transition"
          placeholder="PIN"
          name="pin"
          maxlength="6"
          pattern="\d{6}"
          oninput="this.value = this.value.replace(/[^0-9]/g, '')"
          required
          type="password"
          value="<?= sanitizeInput($pin) ?>" />
        <p class="text-red-600 text-sm"><?= $errors['pin'] ?></p>

        <button
          class="w-full p-2 bg-gray-50 rounded-full font-bold text-gray-900 border-4 border-gray-700 hover:border-blue-500 transition"
          type="submit">
          Submit
        </button>

        <p class="text-white">
          Forgot account?
          <a class="text-blue-300 hover:text-blue-500" href="#">Contact Support</a>
        </p>
      </div>
    </form>
  </div>

  <script type="module" src="./src/main.js"></script>
</body>

</html>