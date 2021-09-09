<?php

namespace App\Models;

use App\Models\TblProdi;
use App\Models\ThnAjaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblListJudul extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'thn_ajaran_id',
        'namaJudul',
        'penulis',
        'metode',
        'abstrak',
    ];

    /**
     * Get the thn_ajaran that owns the TblListJudul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thn_ajaran()
    {
        return $this->belongsTo(ThnAjaran::class);
    }

    /**
     * Get the tbl_prodi that owns the TblListJudul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tbl_prodi(): BelongsTo
    {
        return $this->belongsTo(TblProdi::class);
    }

    /**
     * Get the tbl_pengajuans that owns the TblListJudul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tbl_pengajuans()
    {
        return $this->belongsTo(TblPengajuan::class);
    }
}
