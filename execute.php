<?php
  $content = file_get_contents("php://input");
  $update = json_decode($content, true);
  if(!$update)
    {
      exit;
    }
  $message = isset($update['message']) ? $update['message'] : "";
  $messageId = isset($message['message_id']) ? $message['message_id'] : "";
  $chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
  $firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
  $lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
  $username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
  $date = isset($message['date']) ? $message['date'] : "";
  $text = isset($message['text']) ? $message['text'] : "";
  $text = trim($text);
  $text = strtolower($text);
  header("Content-Type: application/json");
  $response = '';
  if(strpos($text, "/start") === 0 || $text=="ciao")
    {
      $response = "Ciao $firstname, e benvenuto!";
    }
  elseif($text=="/downloads")
    {
      $response = "I comandi per scaricare:
	
      !Games
      !Apps
      !wallpapers
      !Ringtones
      !Themes
      ";
    }
  elseif($text=="!Games")
    {
      $response = "http://jdworldstk.altervista.org/The-Fallen-Bot";
    }
  elseif($text=="!Apps")
    {
      $response = "http://jdworldstk.altervista.org/The-Fallen-Bot";
    }
  elseif($text=="!Wallpapers")
    {
      $response = "http://jdworldstk.altervista.org/The-Fallen-Bot";
    }
  elseif($text=="!Ringtones")
    {
      $response = "http://jdworldstk.altervista.org/The-Fallen-Bot";
    }
  elseif($text=="!Themes")
    {
      $response = "http://jdworldstk.altervista.org/The-Fallen-Bot";
    }
  elseif($text=="/list-news")
    {
      $response = "Lista delle novità";
    }
  elseif($text=="domanda 2")
    {
      $response = "risposta 2";
    }
  elseif($text=="domanda 3")
    {
      $response = "risposta 3";
    }
  elseif($text=="domanda 4")
    {
      $response = "risposta 4";
    }
  elseif($text=="domanda 5")
    {
      $response = "risposta 6";
    }

  else
    {
      $response = "Comando non valido!";
    }
  $parameters = array('chat_id' => $chatId, "text" => $response);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
