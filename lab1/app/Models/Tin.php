<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    protected $table = 'tin';
    protected $fillable = ['tieude', 'xem', 'ngayDang'];
}
?>