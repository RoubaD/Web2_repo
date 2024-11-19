<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            .detail {
                margin-bottom: 10px;
                font-size: 16px;
            }

            .label {
                font-weight: bold;
            }

    </style>
</head>
<body>
<div class="container">
    <h1>Edit User</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update-user', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>First Name:</label>
            <input type="text" name="first_name" value="{{ $user->first_name }}" required 
                   style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div>
            <label>Last Name:</label>
            <input type="text" name="last_name" value="{{ $user->last_name }}" required 
                   style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div>
            <label>Gender:</label>
            <select name="gender" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required 
                   style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <button type="submit" 
                style="margin-top: 20px; padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px;">
            Update
        </button>
        <a href="{{ route('user-details', $user->id) }}" 
           style="display: inline-block; margin-left: 10px; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px;">
            Cancel
        </a>
    </form>
</div>
</body>
</html>
