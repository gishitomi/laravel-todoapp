<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    // 状態定義
    const STATUS = [
        1 => ['label' => '未完了', 'class' => 'badge-danger'],
        2 => ['label' => '作業中', 'class' => 'badge-primary'],
        3 => ['label' => '完 了', 'class' => 'badge-success'],
    ];

    const PRIORITY = [
        1 => ['class' => 'large'],
        2 => ['class' => 'medium'],
        3 => ['class' => 'small']
    ];

    // 状態のラベル
    public function getStatusLabelAttribute()
    {
        // 初期値...カラムを取得
        $status = $this->attributes['status'];
        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }
    // 状態のクラス
    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    // 重要度のクラス
    public function getPriorityClassAttribute()
    {
        $priority = $this->attributes['priority'];

        if (!isset(self::PRIORITY[$priority])) {
            return '';
        }
        return self::PRIORITY[$priority]['class'];
    }

    /**
     * 整形した期限日
     * @return string
     */
    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}
