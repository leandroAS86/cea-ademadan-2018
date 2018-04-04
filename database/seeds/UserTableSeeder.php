<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$role_user = Role::where('name', 'User')->first();
        //$role_author = Role::where('name', 'Author')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'leandro';
        $user->email = 'pj.leandro@gmail.com';
        $user->password = bcrypt('leandro');
        $user->save();
        $user->roles()->attach($role_admin);
        /*
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'pj.leandro@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->name = 'Author';
	    $author->email = 'author@author.com';
        $author->password = bcrypt('author');
        $author->save();
        $author->roles()->attach($role_author);
        */
    }
}