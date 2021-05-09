<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255); // O título da notícia.
            $table->string('resumo', 255)->nullable(); // Um resumo breve para mostrar na listagem.
            $table->text('conteudo'); // O conteúdo em si da notícia.
            $table->string('slug', 255); // A url da postagem.
            $table->boolean('mostrar')->default(1); // Se true, mostra na listagem; caso contrário, não é mostrada.
            $table->unsignedBigInteger('autor_id'); // O Autor que criou a notícia.
            $table->unsignedBigInteger('categoria_id'); // A categoria à qual a mensagem pertence.
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('autor_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
