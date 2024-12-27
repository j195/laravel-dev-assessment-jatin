<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\Skill;
use App\Models\Job_Opening;
use DB;

class Index extends Component
{
    public $job;
    public array $jobs = [];

    public function mount()
    {
        $jobs = Job_Opening::get()->toArray();
        $this->jobs = $jobs;

    }

    /**
     * Function: deleteSkill
     * Description: This function will delete the skill
     * @param App\Models\Skill $skill
     * @return void
     */
    public function deleteJob(Job_Opening $job) {
        if ($job) {

            $deleteResponse = $job->delete();

            if ($deleteResponse) {
                session()->flash('success', 'Job deleted successfully!');
            } else {
                session()->flash('error', 'Unable to delete Job. Please try again!');
            }
        }
        else {
            session()->flash('error', 'Job not found. Please try again!');
        }

        $skills = $this->render();

         return $this->redirect('/admin/jobs', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
