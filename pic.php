<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picture</title>
    <script>
        function processImage() {
            const photoSize = document.getElementById("photoSize").value;
            const borderColor = document.getElementById("colorPicker").value;
            const image = document.getElementById("editableImage");

            image.style.width = photoSize + "px"; 
            image.style.height = "auto"; 
            image.style.border = `5px solid ${borderColor}`; 
        }
    </script>
</head>
<body>
    <h2>PEYS APP</h2>

    <div>
        <label for="photoSize">Select Photo Size:</label>
        <input type="range" id="photoSize" name="photoSize" min="1" max="500" value="250">
    </div>

    <div>
        <label for="borderSize">Select Border Color:</label>
        <input type="color" id="colorPicker" />
    </div>

    <button type="button" onclick="processImage()">Process</button>

    <div style="height: 20px; visibility: hidden;"></div> 
    
    <div>
        <img src="https://play-lh.googleusercontent.com/O8mvDQlw4AwmGfUrh4lviZD_PwwhRHz2etA25F77SbXrm3qEHOt2826aNkKar4D0yw" alt="Editable Image" id="editableImage" style="border: 5px solid transparent;">
    </div>
</body>
</html>';
?>
