<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Review;
use App\Models\Like;
use App\Models\Rate;
use App\Models\Comment;
use App\Models\Report;
use App\Models\Guarantee;
use App\Models\Question;
use App\Models\Time;
use App\Models\PayMeta;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'type' => $this->faker->word,
            'score' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->boolean,
            'showcase' => $this->faker->boolean,
            'used' => $this->faker->boolean,
            'original' => $this->faker->boolean,
            'suggest' => $this->faker->boolean,
            'count' => $this->faker->numberBetween(1, 100),
            'variety' => $this->faker->word,
            'slug' => $this->faker->slug,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'off' => $this->faker->boolean,
            'offPrice' => $this->faker->randomFloat(2, 0, 100),
            'user_id' => User::factory(),
        ];
    }

    /**
     * تخصیص دسته‌بندی‌ها و برچسب‌ها به پست
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withCategoriesAndTags(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->category()->attach(Category::factory()->count(3)->create());
            $post->tag()->attach(Tag::factory()->count(3)->create());
        });
    }

    /**
     * تخصیص کامنت‌ها و لایک‌ها به پست
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withCommentsAndLikes(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->comments()->createMany(Comment::factory()->count(3)->make()->toArray());
            $post->like()->createMany(Like::factory()->count(3)->make()->toArray());
        });
    }

    /**
     * تخصیص نظرات و رتبه‌ها به پست
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withReviewsAndRates(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->review()->attach(Review::factory()->count(3)->create());
            $post->rate()->createMany(Rate::factory()->count(3)->make()->toArray());
        });
    }

    /**
     * تخصیص گزارش‌ها و ضمانت‌ها به پست
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withReportsAndGuarantees(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->report()->associate(Report::factory()->create());
            $post->guarantee()->attach(Guarantee::factory()->count(3)->create());
        });
    }

    /**
     * تخصیص سوالات و زمان‌ها به پست
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withQuestionsAndTimes(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->question()->createMany(Question::factory()->count(3)->make()->toArray());
            $post->time()->attach(Time::factory()->count(3)->create());
        });
    }

    /**
     * تخصیص اطلاعات پرداخت به پست
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withPayMeta(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->payMeta()->createMany(PayMeta::factory()->count(3)->make()->toArray());
        });
    }
}
