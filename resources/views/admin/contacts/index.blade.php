@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Contacts</h1>
        
        <table class="table table-hover align-middle">
            <thead>
                <th scope="col">E-mail Adress</th>
                <th scope="col">Message</th>
                <th scope="col">Send</th>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->email_address }}</td>
                        <td>{{ $contact->email_content }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>
                            <div class="d-flex gap-2">
    
                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection