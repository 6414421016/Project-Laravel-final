<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){  //-> เมื่ออยู่ในหน้า home แล้ว จะไม่สามารถออกหน้า login ผ่านการพิมพ์ช่องค้นขาได้
            return redirect(route('home'));
        }
        return view('register.login');
    }

    function registration(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('register.registration');
    }



    function loginPost(Request $request){
        //การใช้ validate ช่วยในการตรวจสอบข้อมูลที่ส่งมาตรงตามกฎที่กำหนดไว้
        $request->validate([
            //เป็นการตรวจสอบว่ามี email และ password ที่ถูกส่งมาหรือไม่
            'email' => 'required',
            'password' => 'required'
        ]);

        //จากนั้น, โค้ดทำการดึงข้อมูล email และ password จาก request มาเก็บไว้ในตัวแปร $credentials:
        $credentials = $request->only('email','password');

        //ใช้ Auth::attempt($credentials) เพื่อทำการตรวจสอบข้อมูลการเข้าสู่ระบบ ถ้าข้อมูลถูกต้อง, 
        //ผู้ใช้จะถูกลงทะเบียน (logged in) และถูก redirect ไปที่หน้า home
        if(Auth::attempt($credentials)){  //Auth::attempt คือการเข้าสู่ระบบ (Login):
            // return redirect()->intended(route('home')); //ส่งผู้ใช้ไปหน้า home เมื่อเข้าสู้ระบบผ่าน
            return redirect('home');
        }
        //กลับไปหน้า login และแสดง error
        return redirect(route('login'))->with("error", "Login details are not nalid");
    }


    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users', //unique:users: ระบุว่าข้อมูลที่ถูกส่งมาต้องเป็นค่าที่ไม่ซ้ำกับค่าในฐานข้อมูล
            'password' => 'required'
        ]);

        $data['name'] = $request->name;  //เป็นการกำหนดค่าชื่อของผู้ใช้จากข้อมูลที่ถูกส่งมาใน HTTP request.
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        //เป็นการกำหนดค่ารหัสผ่านของผู้ใช้จากข้อมูลที่ถูกส่งมาใน HTTP request โดยใช้ฟังก์ชัน Hash::make() 
        //เพื่อเข้ารหัสรหัสผ่านก่อนที่จะบันทึกลงในฐานข้อมูล. นี้เป็นการเพิ่มความความปลอดภัยของรหัสผ่าน.
        
        $user = User::create($data);

        if(!$user){  // ส่วนนี้ตรวจสอบว่าการสร้างผู้ใช้ในฐานข้อมูลไม่สำเร็จ
            return redirect(route('registration'))->with("error", "Registration falied, try again");
        }
        //หากสำเร็จจะไปหน้า login
        return redirect(route('login'))->with("success", "Registration success, Login to account the app");
    }


    function logout(){
        // Session::flush();
        // request()->session()->flush();
        session()->flush(); //->  ถูกใช้ในการล้างข้อมูลทั้งหมดที่ถูกเก็บไว้ใน session ปัจจุบัน. 
        Auth::logout(); // ถูกใช้เพื่อทำการออกจากระบบ (logout) ของผู้ใช้. ฟังก์ชันนี้จะทำลาย session ที่เกี่ยวข้องกับผู้ใช้ที่กำลังลงทะเบียนอยู่ และทำให้ผู้ใช้ไม่ได้ลงทะเบียน.
        return redirect(route('login'));
    }
}