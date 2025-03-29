<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BlogCategory;
use App\Models\Article;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $user = User::first() ?? User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $category = BlogCategory::first() ?? BlogCategory::create(['name' => 'Noticias']);

        Article::create([
            'title' => 'Artículo de prueba',
            'content' => 'Este es un contenido de prueba.',
            'author_id' => $user->id,
            'category_id' => $category->id,
            'published_at' => now(),
        ]);
    }
}
