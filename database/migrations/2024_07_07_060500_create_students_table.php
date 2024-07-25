<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Students;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('idno', 7);
            $table->string('name', 255);
            $table->enum('usertype', ['Admin', 'Student'])->default('Student');
            $table->timestamps();
        });

        // $data = [
        //     [
        //         'idno' => '1800326',
        //         'name' => 'Justine Taga-an',
        //         'usertype' => 'Admin'
        //     ],
        //     [
        //         'idno' => '1900366',
        //         'name' => 'Adelle Andales',
        //         'usertype' => 'Student'
        //     ]
        // ];
        // DB::table('students')->insert($data);

        $user1 = User::create([
            'name' => "Justine Taga-an",
            'email' => "tagaanjustinemark3@gmail.com",
            'password' => Hash::make('secret')
        ]);

        $user2 = User::create([
            'name' => "Adelle Andales",
            'email' => "adelle@gmail.com",
            'password' => Hash::make('secret')
        ]);

        Students::create([
            'id' => $user1->id,
            'idno' => '1800326',
            'name' => 'Justine Taga-an',
            'usertype' => 'Admin'            
        ]);

        Students::create([
            'id' => $user2->id,
            'idno' => '1900366',
            'name' => 'Adelle Andales',
            'usertype' => 'Student'     
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
