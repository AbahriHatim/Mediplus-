<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<table>
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($doctors as $doctor)
    <tr>
        <th scope="row">{{ $doctor->id }}</th>
        <td>{{ $doctor->name }}</td>
        <td>{{ $doctor->email }}</td>
        <td><a href="{{ route('editUser', ['id' => $doctor->id]) }}">Edit</a></td>
        <td>
            <form method="POST" action="{{ route('deleteUser', ['id' => $doctor->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
        
      
      </tr>                            @endforeach


</tbody>
</table>