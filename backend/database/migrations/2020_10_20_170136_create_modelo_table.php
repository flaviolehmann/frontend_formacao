<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void    apiURL: string = `${environment.apiUrl}/modelos`;

    constructor(private http: HttpClient) { }

    index(): Observable<Modelo[]> {
        return this.http.get<Modelo[]>(this.apiURL);
    }

    show(id: number | string): Observable<Modelo> {
        return this.http.get<Modelo>(`${this.apiURL}/${id}`);
    }
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id('id');
            $table->string('descricao', 100);
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos');
    }
}
