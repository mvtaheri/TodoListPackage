    <?php 

namespace Taheri\Todolist\Database\Factories;

use Taheri\Todolist\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Taheri\Todolist\Tests\User;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
            'description'=>$this->faker->paragraph,
            'status'=>true,
            'author_id'=>1,
            'author_type'=>'User'
        ];
    }
}

?>