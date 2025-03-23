<h1>Quan li nguoi dung</h1>
<div
class="table-responsive-sm"
>
<table
    class="table"
>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Time Created</th>
            <th scope="col">Time Updated</th>
        </tr>
    </thead>
    <tbody>
       @foreach($data as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
       @endforeach
       
    </tbody>
</table>
</div>
