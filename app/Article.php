<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /*
      定义表名
     */
    protected $table = 'article';

    /*
      填充的字段，即要写入表的字段
     */
    protected $fillable = ['title', 'content'];
}
