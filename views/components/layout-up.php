<!DOCTYPE html>
<html>
<head>
    <style>
        .container {
            height: 100vh;
            max-width: 1440px;
            width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 2;
            width: 1000px;
            margin: 0 auto;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="date"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    
        .navbar {
            background-color: #333;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        
        table {
            width: 100%;
            margin: 20px;
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        
        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
    <title>Форма отправки данных</title>
</head>
<body>
    <div class="container">
        <?php include('header.php'); ?>
        <div class="content">
