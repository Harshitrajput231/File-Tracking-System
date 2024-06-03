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
			<label for="dispatch"><b>Enter Dispatch number:</b></label>
        			<input type="text" id="dispatch" name="dispatch" size="10" >
					
					<br>
					<br>
				
				<label for="file" class="form-label"><b>Select file</b></label>
				<input type="file" class="form-control" name="file" id = "file">
                <br>
                <label for="whom"><b>Select to whom file is to be send </b></label>
                    <select placeholder="" id="whom" name="whom" required>
                    <option value = "Administrator">Administrator</option>
                    <option value = "HOD">HOD sir</option>
                    <option value = "Professor">Professor</option>
                    <option value = "Registrar">Registrar</option>
                    <option value = "Junior engineer">Junior engineer</option>
                    <option value = "Assistant engineer">Assistant Junior engineer</option>
                    </select>
					<!-- <br>
					<br>
					<label for="description">Discription:</label>
        			<input type="text" id="description" name="description" size="90" > -->
					<br>
					<br>
					<b>Description:</b>  <br><textarea id="description" name="description" cols="30" rows="5"></textarea>
			</div>
			<button onclick="location.href = 'http://localhost/college/upload.php';" type="submit" class="btn btn-primary">Upload file</button>
            <button  onclick="location.href = 'http://localhost/college/options.php';" class="btn btn-primary">HOME</button>
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
    width: 400px; /* Increased width for better content fit */
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