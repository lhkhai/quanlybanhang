<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class supplier extends Model
{
    use HasFactory;
    Protected $fillable = ['mancc','tenncc','diachincc','sdtncc','emailncc','ttthanhtoan','ghichu'];
    public function insert(Request $request)
    { 
        DB::table('suppliers')->insert(['mancc'=>$request->mancc,
                                        'tenncc'=>$request->tenncc,
                                        'diachincc'=>$request->diachincc,
                                        'sdtncc'=>$request->sdtncc,
                                        'emailncc'=>$request->emailncc,
                                        'ttthanhtoan'=>$request->ttthanhtoan,
                                        'ghichu'=>$request->ghichu,
                                        'created_at'=> date('Y-m-d H:i:s')
    ]);
    
}
}
