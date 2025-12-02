<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Campaign extends Model
{
    use HasFactory;
    protected $fillable = ['brand_id','title','description','budget','required_dna_traits','status','start_date','end_date'];
    protected $casts = ['required_dna_traits'=>'array','start_date'=>'datetime','end_date'=>'datetime'];
    public function brand(){return $this->belongsTo(User::class,'brand_id');}
    public function offers(){return $this->hasMany(Offer::class);}
    public function threads(){return $this->hasMany(Thread::class);}
    public function deliverables(){return $this->hasMany(Deliverable::class);}
    public function ratings(){return $this->hasMany(Rating::class);}
    public function payments(){return $this->hasMany(Payment::class);}
}
