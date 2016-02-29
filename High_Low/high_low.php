<?php
  
  echo("\$argv values: ");
  var_dump($argv);
  echo("\$argc values: ");
  var_dump($argc);

  do {
  $randNum = mt_rand($argv[1],$argv[2]);
  $turns = 0;
  $userNum = "";
  $play = 1;
      fwrite(STDOUT, "\nGuess a number from $argv[1] to $argv[2]\n\nYour goal is to match the random number\n\nKeep following the prompts until you win!\n\n");
      fwrite(STDOUT, "Enter a number $argv[1]-$argv[2]\n");
      $userNum = fgets(STDIN);
      
      do {
        if ($userNum < 1 || $userNum > 100 || $userNum == "") {
          fwrite(STDOUT, "Please enter a valid number.\n");
          $userNum = fgets(STDIN);
        }
      } while ($userNum < 1 || $userNum > 100 || $userNum == "");
      
      do {
        if ($userNum < $randNum) {
          fwrite(STDOUT, "\nGuess Higher!\n");
          fwrite(STDOUT, "Enter Another number $argv[1]-$argv[2]\n");
          $userNum = fgets(STDIN);
          $turns++;
        } else if($userNum > $randNum) {
          fwrite(STDOUT, "\nGuess Lower!\n");
          fwrite(STDOUT, "Enter Another number $argv[1]-$argv[2]\n");
          $userNum = fgets(STDIN);
          $turns++;
        }
      } while ($userNum != $randNum);

      fwrite(STDOUT, "\nGood Guess! You Win!\n");
      fwrite(STDOUT, "It took you $turns turns.\n\n");
      fwrite(STDOUT, "\nHit Any Key to play again.\n");
      fgets(STDIN);
  } while ($play != 0);
?>