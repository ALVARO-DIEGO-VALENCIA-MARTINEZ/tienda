<?php


namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCommentNotification;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required|string',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $comment = new Comment($request->all());
        $comment->article_id = $article->id;
        $comment->save();

        // Verifica que el autor tiene un correo antes de enviar
        if ($article->author && $article->author->email) {
            Mail::to($article->author->email)->send(new NewCommentNotification($comment));
        }

        return redirect()->route('articles.show', $article)->with('success', 'Comentario agregado.');
    }
}
