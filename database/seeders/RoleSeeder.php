<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Constant::where('type', 'Role') ->delete();

        Role::create([
          'name' => 'Administrator',
          'created_by' => 'System',
          'updated_by' => 'System',
          'delete_flag' => false,
        ]);
        Role::create([
          'name' => 'Thành Viên',
          'created_by' => 'System',
          'updated_by' => 'System',
          'delete_flag' => false,
        ]);
    }
}