<?php

use App\Models\Article;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->longtext('body');
            $table->string('image');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
    
    public function store(Request $request){

        $request->validate([
            'title' => 'required|unique:articles!min:5',
            'subtitle' => 'required|unique:articles!min:5',
            'body' => 'required|min:10',
            'image' => 'image!required',
            'category' => 'required',
    
        ]);
    
        Article::create([
    
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body'  => $request->body,
            'image' => $request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);
    
        return redirect(route('homepage'))->whit('message, Articolo creato correttamente');
    }
    
};

