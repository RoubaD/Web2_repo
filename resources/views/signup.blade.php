<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hello DR.</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
 
            .box_register {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
            }
 
            .box_register h1 {
                color: #333;
                text-align: center;
                margin-bottom: 20px;
            }
 
            .form-group {
                display: flex;
                align-items: center;
                margin-bottom: 12px;
            }
 
            .form-group label {
                width: 120px;
                font-size: 14px;
                margin-right: 10px;
            }
 
            .form-group input[type="text"],
            .form-group input[type="password"] {
                flex: 1;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 14px;
            }
 
            .form-group .gender-options {
                flex: 1;
            }
 
            button {
                width: 100%;
                padding: 10px;
                background-color: #007BFF;
                border: none;
                border-radius: 4px;
                color: white;
                font-size: 16px;
                cursor: pointer;
                margin-top: 10px;
            }
 
            button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <form action="/signup" method="POST" class="box_register">
            @csrf  
            <h1>Register</h1>

            @if(session('success'))
            <div style="color: green; text-align: center; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
            @endif

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" required>
            </div>
 
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>
 
            <div class="form-group">
                <label>Gender:</label>
                <div class="gender-options">
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                </div>
            </div>
 
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </div>
 
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
 
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="confirm_password" required>
            </div>
               
            <button type="submit">Register</button>
        </form>
    </body>
</html>