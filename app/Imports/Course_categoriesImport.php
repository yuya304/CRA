<?php

namespace App\Imports;

use App\Models\Course_category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Course_categoriesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Course_categories([
            'course_id'=>$row['course_id'],
            'subject_id'=>$row['subject_id'],
            'attribute_id'=>$row['attribute_id']
        ]);
    }
}
