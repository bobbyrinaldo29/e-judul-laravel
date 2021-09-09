<?php

namespace App\Models;

use App\Models\TblListJudul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThnAjaran extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'thn_ajaran',
        'status',
    ];

    /**
     * Get all of the comments for the ThnAjaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tbl_list_judul()
    {
        return $this->hasMany(TblListJudul::class);
    }

    /**
     * Get all of the tbl_pengajuans for the ThnAjaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tbl_pengajuans()
    {
        return $this->hasMany(TblPengajuan::class);
    }
}
