<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;

use App\Models\Skill;
use App\Models\Job_Opening;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title,$description,$experience,$salary,$location,$extra,$company_name,$company_logo,$skills;
    public $job_id;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'experience' => 'required',
        'salary' => 'required',
        'location' => 'required',
        'extra' => 'required',
        'company_name' => 'required',
        'company_logo' => 'required|image|mimes:jpg,jpeg,png,svg,bmp,webp,gif|max:2048',
        'skills' => 'required',
    ];

    protected $messages = [
        'title.required' => 'The Title cannot be empty.',
        'description.required' => 'The Description cannot be empty.',
        'experience.required' => 'The Experience can not be empty',
        'salary' => 'The Salary can not be empty',
        'location' => 'The Location can not be empty',
        'extra' => 'The extra fields can not be empty',
        'company_name' => 'The Company Name can not be empty',
        'company_logo.required' => 'Featured Image is required',
        'company_logo.image' => 'Featured Image must be a valid Image',
        'company_logo.mimes' => 'Featured Image accepts only jpg, jpeg, png, svg, bmp, webp and gif',
        'company_logo.max' => 'Featured Image must not be a larger than 2MB',
        'skills' => 'The Skill can not be empty',
    ];

    protected $validationAttributes = [

    ];

    public function render()
    {
        $skillsData = Skill::select('name','id')->where('deleted_at','=',NULL)->orderBy('id','desc')->get();
        return view('livewire.pages.jobs.create', compact('skillsData'));
    }


    public function saveJob() {

        $validatedData = $this->validate();

        $imagePath = null;

        if ($this->company_logo) {
            $imageName = time().'.'.$this->company_logo->extension();
            $imagePath = $this->company_logo->storeAs('/uploads', $imageName);
        }

        $jobs = Job_Opening::updateOrCreate(['id' => $this->job_id], [
            'title' => $this->title,
            'description' => $this->description,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'location' => $this->location,
            'extra' => $this->extra,
            'company_name' => $this->company_name,
            'logo' => $imagePath,
            'skills' => $this->skills,
            'extra_info' => explode(',', $this->extra),
        ]);

        if ($jobs) {
            session()->flash('success', 'Job has been created successfully!');
        }
        else {
            session()->flash('error', 'Unable to create Job. Please try again!');
        }

        return $this->redirect('/admin/jobs', navigate: true);
    }

}
