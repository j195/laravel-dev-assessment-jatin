<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use App\Models\Skill;
use Livewire\Attributes\Rule;



class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    //protected $paginationTheme = 'bootstrap';

    public $activePageNumber = 1;

    public $sortColumn = 'id';
    public $sortOrder = 'desc';

    public $skill = null;
    public $isView = false;

    public $page;
    #[Rule('required|min:3')]
    public $name;

    #[Locked]
    public $skill_id;


    public $isEdit = false;

    /**
     * Function: fetchSkills
     * Description: This function will fetch the blog posts
     * @param NA
     * @return App\Models\Skill
     */
    public function fetchSkills() {
        return Skill::get()
        ->orderBy($this->sortColumn, $this->sortOrder)->paginate(5);
    }

    public function render()
    {
        $skills = Skill::get();
        return view('livewire.pages.skills.index', [
            'skills' => Skill::orderBy('id','desc')->paginate(5),
        ]);
    }

    /**
     * Function: updatingPage
     * Description: Track the active page from pagination
     * @param integer $pageNumber
     * @return void
     */
    public function updatingPage($pageNumber) {
        $this->activePageNumber = $pageNumber;
    }

    public function saveSkill() {

        $this->validate();

        $rules = [
            'name' =>  'required|string|unique:skills,name,{$skill->id}',
        ];

        $messages = [
            'name.required' => 'Skill Name is required',
        ];

        $this->validate($rules, $messages);

        if ($this->skill) {
            $updateSkill = Skill::updateOrCreate(['id' => $this->skill_id], [
                'name' => $this->name,
            ]);
            //$this->skill->name = $this->name;
            //$updateSkill = $this->skill->save();

            if ($updateSkill) {
                session()->flash('success', 'Skill has been updated successfully!');
            }
            else {
                session()->flash('error', 'Unable to update Skill. Please try again!');
            }
        }

        else {
            $post = Skill::updateOrCreate(['id' => $this->skill_id], [
                'name' => $this->name,
            ]);

            if ($post) {
                session()->flash('success', 'Skill has been created successfully!');
            }
            else {
                session()->flash('error', 'Unable to create Skill. Please try again!');
            }
        }
        return $this->redirect('/admin/skills', navigate: true);
    }

    /**
     * Function: deleteSkill
     * Description: This function will delete the skill
     * @param App\Models\Skill $skill
     * @return void
     */
    public function deleteSkill(Skill $skill) {
        if ($skill) {

            $deleteResponse = $skill->delete();

            if ($deleteResponse) {
                session()->flash('success', 'Skill deleted successfully!');
            } else {
                session()->flash('error', 'Unable to delete Skill. Please try again!');
            }
        }
        else {
            session()->flash('error', 'Skill not found. Please try again!');
        }

        $skills = $this->render();

        if ($this->activePageNumber > 1) {
            # Redirect to the Active page - 1 (Previous Page)
            $this->gotoPage($this->activePageNumber - 1);
        }
        else {
            # Redirect to the Active Page
            $this->gotoPage($this->activePageNumber);
        }

         return $this->redirect('/admin/skills', navigate: true);
    }

    public function editSkill($id)
    {
        $this->title = 'Edit Skill';

        $skill = Skill::findOrFail($id);

        $this->skill_id = $id;

        $this->name = $skill->name;

        $this->isEdit = true;
    }

}
