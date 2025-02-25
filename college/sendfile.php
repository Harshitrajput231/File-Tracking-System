<?phpsession_start();
$_SESSION["whom"] = $_POST["whom"];
$_SESSION["dispatch"] = $_POST["dispatch"];
$_SESSION["description"] = $_POST["description"];
// echo $_SESSION["whom"];
// echo $_SESSION["dispatch"];
// echo"hello";
// $variable = "Hello, world!";
// echo $variable;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<title>File upload and download</title>
	
</head>
<body>
	<div class="container_mt-5">
		<h2>Upload a file</h2>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
			<label for="dispatch"><b>Enter File ID:</b></label>
<input type="text" id="dispatch" name="dispatch" size="10" required onkeyup="checkFileID()">
<p>Please note the File ID for tracking the file or you can see the file ID in the received file section.</p>
<p id="fileIDMessage" style="color: red;"></p> <!-- Message for validation feedback -->

<!-- Checkbox to allow duplicate File ID -->
<div>
    <input type="checkbox" id="allowDuplicate" onchange="toggleAllowDuplicate()">
    <label for="allowDuplicate">I want to upload the file with the same ID</label>
</div>
<script>
    function checkFileID() {
        const fileID = document.getElementById('dispatch').value;
        const message = document.getElementById('fileIDMessage');
        const uploadButton = document.querySelector('button[type="submit"]');
        const allowDuplicateCheckbox = document.getElementById('allowDuplicate');

        // Reset the checkbox if File ID changes
        allowDuplicateCheckbox.checked = false;

        // Send AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'checkFileID.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                if (xhr.responseText === 'exists') {
                    message.textContent = 'File ID already exists. Check the box to allow the same ID.';
                    document.getElementById('dispatch').setCustomValidity('File ID already exists.');
                    uploadButton.disabled = true; // Disable the upload button
                    allowDuplicateCheckbox.disabled = false; // Enable the checkbox
                } else {
                    message.textContent = '';
                    document.getElementById('dispatch').setCustomValidity('');
                    uploadButton.disabled = false; // Enable the upload button
                    allowDuplicateCheckbox.disabled = true; // Disable the checkbox
                }
            }
        };
        xhr.send('fileID=' + encodeURIComponent(fileID));
    }

    function toggleAllowDuplicate() {
        const allowDuplicateCheckbox = document.getElementById('allowDuplicate');
        const uploadButton = document.querySelector('button[type="submit"]');
        const message = document.getElementById('fileIDMessage');

        if (allowDuplicateCheckbox.checked) {
            uploadButton.disabled = false; // Allow upload
            document.getElementById('dispatch').setCustomValidity(''); // Clear the validation error
            message.textContent = '';
        } else {
            checkFileID(); // Re-check the file ID when the checkbox is unchecked
        }
    }
</script>

					
					<br>
					<br>
				
				<label for="file" class="form-label"><b>Select file</b></label>
				<input type="file" class="form-control" name="file" id = "file">
                <br>
                <label for="whom"><b>Select to whom file is to be send </b></label>
                    <select placeholder="" id="whom" name="whom" required>
                    <option value = "CSIT">CSIT - Prof.Vinay Rishiwal </option>
                    <option value = "EC">EC - Dr. S.K. TOMAR</option>
                    <option value = "EI">EI - Prof. SANJEEV TYAGI</option>
                    <option value = "EE">EE - Dr. D.D.SHARMA</option>
                    <option value = "ME">ME - Dr. M.K. SINGH</option>
                    <option value = "CH">CH - DR. KARUNA</option>
                    </select>
					<!-- <br>
					<br>
					<label for="description">Discription:</label>
        			<input type="text" id="description" name="description" size="90" > -->
					<br>
					<br>
					<b>Description:</b>  <br><textarea id="description" name="description" cols="80" rows="5"></textarea>
                    <br>
                    <br>
                    <!-- New Addition: Priority field -->
                    <label for="priority"><b>Set Priority:</b></label>
                    <select id="priority" name="priority" class="form-control" required>
                        <option value="High" style="color: red;">High</option>
                        <option value="Medium" style="color: orange;">Medium</option>
                        <option value="Low" style="color: green;" selected>Low</option>
                    </select>
                    <br>
                    <!-- End of New Addition -->

			</div>
			<!-- Upload and Home buttons -->
<button onclick="location.href = 'http://localhost/college/upload.php';" type="submit" class="btn btn-primary" disabled>Upload file</button>
<button onclick="location.href = 'http://localhost/college/options.php';" class="btn btn-primary">HOME</button>
		</form>
	</div>

</body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
    background-image: url("sendfile.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.container_mt-5 {
    background-color: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 800px; /* Increased width for better content fit */
    text-align: center;
}

h2 {
    color: #007bff;
    margin-bottom: 20px;
}

.form-label {
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-primary, .btn-secondary {
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.d-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

    </style>
    
</head>
<body>
    <!-- <div class="container_mt-5">
         <button  onclick="location.href = 'http://localhost/college/options.php';" >HOME</button> 
        
    </div> -->
</body>
</html>

</html>