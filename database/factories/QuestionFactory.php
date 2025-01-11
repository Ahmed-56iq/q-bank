<?php

namespace Database\Factories;

use App\Models\Classify;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * تعريف الحالة الافتراضية للنموذج
     */
    public function definition(): array
    {
        // إنشاء مصفوفة من الإجابات المحتملة
        $answers = [
            $this->faker->unique()->sentence(),
            $this->faker->unique()->sentence(),
            $this->faker->unique()->sentence(),
            $this->faker->unique()->sentence(),
        ];

        // اختيار إجابة عشوائية كإجابة صحيحة
        $correctAnswer = $this->faker->randomElement($answers);

        return [
            'text' => $this->faker->paragraph(),
            'answer_1' => $answers[0],
            'answer_2' => $answers[1],
            'answer_3' => $answers[2],
            'answer_4' => $answers[3],
            'correct_answer' => $correctAnswer,
            'summary_answer' => $this->faker->paragraph(),
            'code' => $this->faker->boolean(30) ? $this->faker->text() : null,
            'classify_id' => Classify::factory(),
        ];
    }
}
