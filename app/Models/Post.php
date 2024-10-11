<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // تعريف الجدول الذي يستخدمه النموذج (إذا كان اسم الجدول مختلفًا عن `posts`)
    protected $table = 'posts';

    // الحقول التي يمكن تعيينها بشكل جماعي
    protected $fillable = [
        'title',
        'body',
        'user_id', // إذا كنت تريد ربط المنشور بمستخدم
        'status', // حالة المنشور (مثل منشور، مسودة، إلخ)
    ];

    // علاقة المستخدم (User) مع المنشورات
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة المنشور بالتعليقات (إذا كان لديك نموذج للتعليقات)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // دالة لجلب جميع المنشورات
    public static function getAllPosts()
    {
        return self::all();
    }

    // دالة لإضافة منشور جديد
    public static function createPost(array $data)
    {
        return self::create($data);
    }

    // دالة لتحديث منشور
    public static function updatePost($id, array $data)
    {
        $post = self::findOrFail($id);
        $post->update($data);
        return $post;
    }

    // دالة لحذف منشور
    public static function deletePost($id)
    {
        $post = self::findOrFail($id);
        return $post->delete();
    }
}
