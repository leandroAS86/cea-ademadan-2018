<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Usuários e controle de níveis de acesso.</div>
                <div class="card-body">
                    <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>User</th>
                                <th>Editor</th>
                                <th>Admin</th>
                                <th>Atribuir função</th> 
                                <th>Excluir usuário</th> 
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <form action="{{ route('cat.atribuir') }}" method="post">
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}<input type="hidden" name="email" value="{{ $user->email }}"> </td>
                                            <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"> </td>
                                            <td> <input type="checkbox" {{ $user->hasRole('Editor') ? 'checked' : '' }} name="role_editor"></td>
                                            <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                            {{ csrf_field() }}
                                            <td><button type="submit" class="btn btn-primary "><i class="fa fa-user-plus"></i> Atribuir</button></td>
                                        </form>
                                        <td><a href="{{ route('cat.delete', $user->id) }}" class="btn btn-danger "><i class="fa fa-user-times"></i> Excluir</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>