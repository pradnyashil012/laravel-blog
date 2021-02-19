<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 300);
        $image = "https://loremflickr.com/g/640/480/".$id;
        return [
            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'image' => $image,
            'description' => $this->faker->text(400),
            'category_id' => function(){
                return Category::inRandomOrder()->first()->id;
            },
            'user_id' => 1,
        ];
    }
}
