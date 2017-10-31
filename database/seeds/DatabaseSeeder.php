<?php

use App\Employee;
use App\Department;
use App\Position;
use App\Email;
use App\Phone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines = array_map('str_getcsv', file('/path/to/csv/file.csvs'));
        foreach($lines as $line){
            $data = [
                    'first_name' => $line[0],
                    'second_name' => $line[1],
                    'last_name' => $line[2],
                    'department' => $line[3],
                    'position' => $line[4],
                    'email_business' => $line[5],
                    'email_personal' => $line[6],
                    'phone_business' => $line[7],
                    'phone_personal' => $line[8]
            ];

            $department = Department::firstOrCreate(['name' => $data['department']]);
            $position = Position::firstOrCreate(['name' => $data['position']]);

            $employee = new Employee;
            $employee->first_name = $data['first_name'];
            $employee->second_name = $data['second_name'];
            $employee->last_name = $data['last_name'];
            $employee->department_id = $department->id;
            $employee->position_id = $position->id;
            $employee->save();

            $email_business = new Email;
            $email_business->email = $data['email_business'];
            $email_business->personal = false;
            $email_business->employee_id = $employee->id;
            $email_business->save();
            $email_personal = new Email;
            $email_personal->email = $data['email_personal'];
            $email_personal->employee_id = $employee->id;
            $email_personal->save();

            $phone_business = new Phone;
            $phone_business->number = $data['phone_business'];
            $phone_business->personal = false;
            $phone_business->employee_id = $employee->id;
            $phone_business->save();
            $phone_personal = new Phone;
            $phone_personal->number = $data['phone_personal'];
            $phone_personal->employee_id = $employee->id;
            $phone_personal->save();

        }
        // $this->call(UsersTableSeeder::class);
    }
}
