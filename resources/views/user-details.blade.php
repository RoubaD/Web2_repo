<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Details</title>
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
        <h1>User Details</h1>

        <div class="detail"><span class="label">First Name:</span> {{ $user->first_name }}</div>
        <div class="detail"><span class="label">Last Name:</span> {{ $user->last_name }}</div>
        <div class="detail"><span class="label">Email:</span> {{ $user->email }}</div>
        <div class="detail"><span class="label">Gender:</span> {{ ucfirst($user->gender) }}</div>

        <a href="{{ route('edit-user', $user->id) }}" 
        style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px;">
            Edit
        </a>

        <form action="{{ route('delete-user', $user->id) }}" method="POST" 
            style="display: inline-block; margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" 
                    style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Delete
            </button>
        </form>

        <a href="/listing" 
        style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px;">
            Back to User List
        </a>
        </div>
    </body>
</html>
