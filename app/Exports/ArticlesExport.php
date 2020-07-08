<?php

namespace App\Exports;
  
use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArticlesExport implements FromCollection, WithHeadings
{
   
    public function collection()
    {
    	return Article::with(['category','createdBy'])->orderBy('id', 'desc')->get();

    }

    public function headings(): array
    {

        return [
            'id',
            'category_id',
            'title',
            'description',
            'content',
            'image',
            'seo_title',
            'seo_description',
            'slug',
            'status',
            'published_at',
            'created_by',
            'last_updated_by',
            'deleted_at',
            'created_at',
            'updated_at',
        ];

    }
}