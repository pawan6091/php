<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Result Checker</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 400px;
  }

  h1 {
    color: #333;
  }

  input[type="number"] {
    padding: 10px;
    margin: 10px 0;
    border-radius: 4px;
    border: 1px solid #ccc;
    width: 100%;
    box-sizing: border-box;
  }

  button {
    padding: 10px 20px;
    background-color: #5cb85c;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #4cae4c;
  }

  .result {
    margin-top: 20px;
    font-size: 1.2em;
    color: #333;
  }
  </style>
</head>

<body>
  <div class="container">
    <h1>Help Roshan to find if the student is pass or fail.</h1>
    <form method="post">
      <input type="number" name="subject1" placeholder="Enter marks for Subject 1" required min="0" max="100">
      <input type="number" name="subject2" placeholder="Enter marks for Subject 2" required min="0" max="100">
      <input type="number" name="subject3" placeholder="Enter marks for Subject 3" required min="0" max="100">
      <input type="number" name="subject4" placeholder="Enter marks for Subject 4" required min="0" max="100">
      <input type="number" name="subject5" placeholder="Enter marks for Subject 5" required min="0" max="100">
      <button type="submit">Check Result</button>
    </form>
    <div class="result">
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $marks = [
          intval($_POST['subject1']),
          intval($_POST['subject2']),
          intval($_POST['subject3']),
          intval($_POST['subject4']),
          intval($_POST['subject5'])
        ];

        $passMark = 40;
        $average = calculateAverage($marks);
        $status = checkPassOrFail($marks,$passMark);
        $res="Passed";
        if($status==false){
          $res="Failed";
        }
        echo "Average Maks:  $average <br>";
        echo "Status: $res";
      }

      function calculateAverage($marks)
      {
        return array_sum($marks)/count($marks);
      }

      function checkPassOrFail($marks, $passMark)
      {
        foreach ($marks as $mark) {
          if ($mark < $passMark) {
            return false;
          }
        }
        return true;
      }
      ?>
    </div>
  </div>
</body>

</html>