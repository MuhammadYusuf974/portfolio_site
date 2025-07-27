<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);

  // Faylga yozish
  $file = fopen("messages.txt", "a");
  fwrite($file, "Ism: $name\nEmail: $email\nXabar: $message\n\n");
  fclose($file);

  echo "Xabaringiz yuborildi!";
} else {
  echo "Noto'g'ri so'rov";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "message" => $_POST["message"],
        "time" => date("Y-m-d H:i:s")
    ];

    file_put_contents("messages.json", json_encode($data, JSON_PRETTY_PRINT) . ",\n", FILE_APPEND);
    echo "Xabar qabul qilindi.";
}
?>

