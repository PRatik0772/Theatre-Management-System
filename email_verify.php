<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			margin: 50px auto;
			max-width: 500px;
			padding: 20px;
			text-align: center;
		}
		h1 {
			color: #444;
			margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }
        input[type="text"] {
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            width: 100%;
        }
        input[type="submit"] {
            background-color: #4285f4;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            transition: background-color 0.2s ease-in-out;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #3367d6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Email Verification</h1>
        
        <form method="POST">
            <label for="verification_code">Please enter the verification code sent to your email:</label>
            <input type="text" name="verification_code" id="verification_code" required>
            <input type="submit" name="submit" value="Verify">
        </form>
    </div>
</body>
</html>
