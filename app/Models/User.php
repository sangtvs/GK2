<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'User'; // Tên bảng trong database
    protected $primaryKey = 'MaUser'; // Khóa chính của bảng
    public $timestamps = false; // Nếu bảng của bạn không có cột timestamps

    protected $fillable = [
        'TenUser', 'MatKhau', // Các trường có thể gán giá trị hàng loạt
    ];
}
