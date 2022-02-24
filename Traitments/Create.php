<?php
include('CallApi.php');


if (isset($_POST)) {
  if (isset($_POST['name']) && isset($_POST['email'])) {
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
      $userInformation = json_encode($_POST);
      $call = new CallApi("POST", "http://localhost:8000/api/users/create", $userInformation);
      $userCreated = $call->sendRequest();
      $_SESSION['success'] = 'Compte crée avec succes!';
      return header("Location: ".'../index.php');
    }

    $_SESSION['error']  = "Veuillez renseigner toutes les informations";
    return header("Location: ".'../create.php');
  }
}
