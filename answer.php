<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Triangle Type Checker with PHP" />
  <meta name="keywords" content="math, triangle, PHP, geometry" />
  <meta name="author" content="Adrina Peighambarzadeh" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
  <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png" />
  <link rel="manifest" href="site.webmanifest" />
  <title>Triangle Type Checker with PHP</title>
</head>

<body>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Types of Triangle, with PHP</span>
      </div>
    </header>
    <main class="mdl-layout__content">
      <div class="right-image">
        <img src="./images/Screenshot 2025-05-01 12.51.38.png" alt="Triangles image" width="500" />
      </div>
      <div class="page-content-answer">
        <div id="answer">
          <?php
          // Check if the necessary sides are set in the GET request
          if (isset($_GET["side-a"]) && isset($_GET["side-b"]) && isset($_GET["side-c"])) {
            // Input: Get the values from the GET request
            $sideA = floatval($_GET["side-a"]);
            $sideB = floatval($_GET["side-b"]);
            $sideC = floatval($_GET["side-c"]);

            // Ensure no side is zero, as it would lead to a division by zero error
            if ($sideA <= 0 || $sideB <= 0 || $sideC <= 0) {
              echo "Sides must be positive numbers greater than zero.";
            } else {
              // Using the cosine law to calculate the angles
              $angleA = acos(($sideB ** 2 + $sideC ** 2 - $sideA ** 2) / (2 * $sideB * $sideC)) * (180 / M_PI);
              $angleB = acos(($sideC ** 2 + $sideA ** 2 - $sideB ** 2) / (2 * $sideC * $sideA)) * (180 / M_PI);
              $angleC = acos(($sideA ** 2 + $sideB ** 2 - $sideC ** 2) / (2 * $sideA * $sideB)) * (180 / M_PI);

              // Calculate the sum of the angles
              $sumOfAngles = round($angleA, 2) + round($angleB, 2) + round($angleC, 2);

              // Check if the sum of angles is 180 (valid triangle)
              if ($sumOfAngles == 180) {
                // Process triangle type
                if ($sideA == $sideB && $sideA == $sideC && $sideB == $sideC) {
                  echo 'If your sides are: ' .
                    'Side a = ' . $sideA . ', ' .
                    'Side b = ' . $sideB . ', and ' .
                    'Side c = ' . $sideC .
                    ', This is an Equilateral Triangle.';
                } elseif ($sideA == $sideC || $sideA == $sideB || $sideB == $sideC) {
                  echo 'If your sides are: ' .
                    'Side a = ' . $sideA . ', ' .
                    'Side b = ' . $sideB . ', and ' .
                    'Side c = ' . $sideC .
                    ', This is an Isosceles Triangle.';
                } else {
                  echo 'If your sides are: ' .
                    'Side a = ' . $sideA . ', ' .
                    'Side b = ' . $sideB . ', and ' .
                    'Side c = ' . $sideC .
                    ', This is a Scalene Triangle.';
                }
              } else {
                // If angles don't sum up to 180, it's not a triangle
                echo 'This is not a triangle.';
              }
            }
          } else {
            echo "Please enter valid side lengths.";
          }
          ?>
        </div>
      </div>
      <div class="page-content-return">
        <a href="./index.php">Return ...</a>
      </div>
    </main>
  </div>
</body>

</html>