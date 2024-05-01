<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
       
     
            @foreach ($patients as $patient)
            <tr>
                <th scope="row">{{ $patient->id }}</th>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
              <td><a href="{{ route('editUser', ['id' => $patient->id]) }}">Edit</a></td>

              <td>
                <form method="POST" action="{{ route('deleteUser', ['id' => $patient->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
            
              </tr>
            @endforeach
      
    </tbody>
</table>