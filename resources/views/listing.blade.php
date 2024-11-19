<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User List</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }
 
            .container {
                max-width: 800px;
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
 
            table {
                width: 100%;
                border-collapse: collapse;
            }
 
            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
 
            th {
                background-color: #007BFF;
                color: white;
            }
 
            tr:hover {
                background-color: #f1f1f1;
            }

            .no-users {
                text-align: center;
                color: #999;
                font-size: 16px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>User List</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div style="color: green; text-align: center; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search Form -->
            <form action="/listing" method="GET" style="margin-bottom: 20px; display: flex; gap: 10px; align-items: center;">
                <div>
                    <input type="text" name="name" placeholder="Search by Name" value="{{ request('name') }}" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div>
                    <input type="email" name="email" placeholder="Search by Email" value="{{ request('email') }}" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <button type="submit" style="padding: 8px 16px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">
                    Search
                </button>
            </form>

            <!-- Display Users in a Table -->
            @if($users->isEmpty())
                <div class="no-users">No users found. Add some users to display here.</div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <a href="{{ route('user-details', $user->id) }}" style="text-decoration: none; color: #007BFF;">
                                        {{ $user->first_name }}
                                    </a>
                                </td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->gender) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </body>
</html>
